#!/bin/sh

AGRONET_DIR="/www/agronet"

tmpdb() {
  cd $AGRONET_DIR
  if [ ! -d ./tmp ];then
    mkdir tmp
  fi
  
  drush sql-dump --result-file=$AGRONET_DIR/tmp/agronet-db.sql
  tar -czvf $AGRONET_DIR/tmp/agronet.db.sql.tar $AGRONET_DIR/tmp/agronet.db.sql
  echo "done."
}

echo "Saving database..."
tmpdb()

