#!/bin/sh

# @author: jul
# @copyright: jul 
# @licence: UNLICENCED

# --> NO trailing slash at end
FINAL_DIR="./tmp/newvoa3r"
PROFILE_DIR="./tmp/commons-profile"

#
# git clone default repositories and enter your name here to get write access 
#
YOUR_PROFILE_REPOSITORY="https://github.com/julianromerajuarez/drupal-voa3rprofile.git"
YOUR_MODULES_REPOSITORY="https://github.com/julianromerajuarez/drupal-voa3rmodules.git"
YOUR_THEME_REPOSITORY="https://github.com/julianromerajuarez/drupal-voa3rtweme.git"
YOUR_LIBRARIES_REPOSITORY="https://github.com/julianromerajuarez/drupal-voa3rlibraries.git"


echo "this process may take some minutes :/ .. please be patient :-)"

echo -n "Creating commons profile..."
rm -rf ${PROFILE_DIR}
git clone --branch 7.x-3.x ${YOUR_PROFILE_REPOSITORY} ${PROFILE_DIR}
echo "done."

echo -n "Deploying newVOA3R..."
rm -rf ${FINAL_DIR}
drush make ${PROFILE_DIR}/build-commons.make --prepare-install ${FINAL_DIR}
echo "done."

if [ ! -d $FINAL_FIR ];then
  echo "...created directory: ${FINAL_DIR}"
  echo ""
fi

echo "Post-installing..."
cp --force ./settings.inc ${FINAL_DIR}/sites/default/
echo "include_once('sites/default/settings.inc');" >>  ${FINAL_DIR}/sites/default/default.settings.php
echo "include_once('sites/default/settings.inc');" >>  ${FINAL_DIR}/sites/default/settings.php
mkdir ${FINAL_DIR}/logs
echo "done."

echo "Installing contrib modules, themes & libraries in ${FINAL_DIR}/sites/all/modules..."
rm -rf ${FINAL_DIR}/sites/all/modules
git clone ${YOUR_MODULES_REPOSITORY} ${FINAL_DIR}/sites/all/modules

rm -rf ${FINAL_DIR}/sites/all/themes
mkdir ${FINAL_DIR}/sites/all/themes
git clone ${YOUR_THEME_REPOSITORY} ${FINAL_DIR}/sites/all/themes/tweme

rm -rf ${FINAL_DIR}/sites/all/libraries
mkdir ${FINAL_DIR}/sites/all/libraries
git clone ${YOUR_LIBRARIES_REPOSITORY} ${FINAL_DIR}/sites/all/libraries

echo "done."

echo "setting permmissions..."

./setperms.sh -x ${FINAL_DIR}

echo "done."

