#!/bin/sh

FMCADIR=/usr/share/nginx/html/fmca
BACKUPDIR=/usr/share/nginx/html/fmca/backup
date=`date "+%Y-%m-%d-%H%M%S"`

if [ ! -d $BACKUPDIR ]
then
  mkdir $BACKUPDIR
  # chmod 777 $BACKUPDIR
  # chgrp -R www-data $BACKUPDIR
  # chown -R www-data $BACKUPDIR
fi

find $BACKUPDIR/* -mmin +$((60*24)) -exec rm {} \;
mysqldump -u root --single-transaction --all-databases | gzip > $BACKUPDIR/$date-backup.sql.gz

# crontab -e
# 15,45 * * * * /usr/share/nginx/html/fmca/backup_mysql.sh

# To copy to remote server from this server
# cron on remote
# 20,50 * * * * rsync -a --rsh=ssh root@185.4.75.210:/usr/share/nginx/html/fmca/backup/ /files/philips
# Remove older 1 week
# 15,45 * * * * find . -mmin +10080 -exec rm {} \;