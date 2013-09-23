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
R="--root=${1} -y"


#
#
# Beware module order
#
#


# Clear all caches
drush $R cc all 




# Disable
drush $R pm-disable navbar
drush $R pm-disable breakpoints


# Uninstall
drush $R pm-uninstall navbar


# Install
drush $R dl admin_menu
drush $R en admin_menu

drush $R dl advagg
drush $R en admin_menu
 