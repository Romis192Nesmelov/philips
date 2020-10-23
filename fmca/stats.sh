#!/bin/sh

FMCADIR=/usr/share/nginx/html/fmca
STATSDIR=/usr/share/nginx/html/fmca/stats
TEMPDIR=/usr/share/nginx/html/fmca/temp

if [ ! -d $STATSDIR ]
then
  mkdir $STATSDIR
  chmod 777 $STATSDIR
  chgrp -R www-data $STATSDIR
  chown -R www-data $STATSDIR
fi
if [ ! -d $TEMPDIR ]
then
  mkdir $TEMPDIR
  chmod 777 $TEMPDIR
  chgrp -R www-data $TEMPDIR
  chown -R www-data $TEMPDIR
fi

rm -f $TEMPDIR/*
rm -f $STATSDIR/*

mysql --database=philips -u root -e "SOURCE $FMCADIR/stats.sql"

cat $TEMPDIR/stat_action_head.csv $TEMPDIR/stat_action_body.csv > $STATSDIR/stat_action.csv
#cat $TEMPDIR/stat_market_head.csv $TEMPDIR/stat_market_body.csv > $STATSDIR/stat_market.csv
#cat $TEMPDIR/stat_permitted_promo_head.csv $TEMPDIR/stat_permitted_promo_body.csv > $STATSDIR/stat_permitted_promo.csv

# zip -j $STATSDIR/stat_action.zip $TEMPDIR/stat_action.csv
# zip -j $STATSDIR/stat_market.zip $TEMPDIR/stat_market.csv
# zip -j $STATSDIR/stat_permitted_promo.zip $TEMPDIR/stat_permitted_promo.csv

python3 "$FMCADIR/send_stats.py"

# crontab -e
# 0 6 * * * /usr/share/nginx/html/fmca/stats.sh


