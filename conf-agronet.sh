#!/bin/sh

echo "usage: $0 -x <your_fresh_and_running_drupal_directory> <mysql_dump_file.sql>"
echo ""

# echo -n "Installing 'Backup and Migrate' module..."
# drush --root=$0 dl backup_migrate
# drush --root=$0 en -y backup_migrate
# echo "done."

if [ "x${1}" != "x-x" ]; then
   echo "error: incorrect usage"
   exit
fi


if [ "x${2}" = "x" ]; then
   echo "error: no arguments"
   exit
fi

if [ ! -d $2 ]; then
  echo "error: $2 must be a directory"
  exit
fi

if [ ! -d $2/sites ]; then
  echo "error: $2 must be a valid drupal installation"
  exit
fi

if [ ! -d $2/profiles ]; then
  echo "error: $2 must be a valid drupal installation"
  exit
fi

if [ ! -d $2/includes ]; then
  echo "error: $2 must be a valid drupal installation"
  exit
fi

if [ ! -f $3 ]; then
  echo "error: sql file: $3 must exist"
  exit
fi




echo -n "Restore database backup..."
drush --root=$2 sqlc < $3
echo "done."




