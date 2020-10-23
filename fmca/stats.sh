#!/bin/sh

FMCADIR=/usr/share/nginx/html/fmca
STATSDIR=/usr/share/nginx/html/fmca/stats

if [ ! -d $STATSDIR ]
then
  mkdir $STATSDIR
  chmod 777 $STATSDIR
  chgrp -R www-data $STATSDIR
  chown -R www-data $STATSDIR
fi

rm -f $STATSDIR/*

mysql --database=philips -u root < stats1.sql | sed 's/\t/;/g' > $FMCADIR/stats/stat_action.csv
mysql --database=philips -u root -e "SOURCE $FMCADIR/stats.sql"
python3 "$FMCADIR/send_stats.py"

# crontab -e
# 0 6 * * * /usr/share/nginx/html/fmca/stats.sh


