#!/bin/sh

echo ""
echo "usage: $0 <drupal_installation_dir>"

if [ "x$1" = "x" ]; then
  echo "error: empty dir"
  exit
fi

if [ ! -d $1/sites ]; then
  echo "error: $1 must be a valid Drupal intall dir"
  exit
fi

if [ ! -d $1/includes ]; then
  echo "error: $1 must be a valid Drupal intall dir"
  exit
fi


# Root
R="root=${1}"

# Clear all caches

drush cc all -y

# beware module orders

# Disable
drush pm-disable -y navbar
drush pm-disable -y breakpoints



# Uninstall
drush pm-uninstall -y navbar