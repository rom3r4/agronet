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
R="--root=${1}"

# Clear all caches

drush $R cc all -y

# beware module orders

# Disable
drush $R pm-disable -y navbar
drush $R pm-disable -y breakpoints



# Uninstall
drush $R pm-uninstall -y navbar