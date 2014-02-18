#!/bin/sh

AGRONET_DIR="/www/agronet"

tmpdb() {
  if [ ! -d $AGRONET_DIR ];then
    echo "$AGRONET_DIR is not a directory"
    exit 1;
  fi
  
  cd $AGRONET_DIR
  if [ ! -d ./tmp ];then
    mkdir tmp
  fi
  
  drush sql-dump --result-file=$AGRONET_DIR/tmp/agronet-db.sql
  tar -czvf $AGRONET_DIR/tmp/agronet.db.sql.tar $AGRONET_DIR/tmp/agronet.db.sql
  cp $AGRONET_DIR/tmp/agronet.db.sql.tar ./
  echo "done."
}

echo "Saving database..."
tmpdb()
exit 0;


