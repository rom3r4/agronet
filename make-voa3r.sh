#!/bin/sh

# @author: jul
# @copyright: jul 
# @licence: UNLICENCED

# --> NO trailing slash at end
FINAL_DIR="./tmp/newvoa3r"
PROFILE_DIR="./tmp/commons-profile"


echo "this process may take some minutes :/ .. please be patient :-)"

echo -n "Creating commons profile..."
rm -rf ${PROFILE_DIR}
git clone --branch 7.x-3.x git@github.com:julianromerajuarez/drupal-voa3rprofile.git ${PROFILE_DIR}
echo "done."

echo -n "Deploying newVOA3R..."
rm -rf ${FINAL_DIR}
drush make ${PROFILE_DIR}/build-commons.make --prepare-install ${FINAL_DIR}
echo "done."

echo "...created directory: ${FINAL_DIR}"
echo ""

echo -n "Post-installing..."
cp --force ./settings.inc ${FINAL_DIR}/sites/default/
echo "include_once('sites/default/settings.inc');" >>  ${FINAL_DIR}/sites/default/default.settings.php
echo "include_once('sites/default/settings.inc');" >>  ${FINAL_DIR}/sites/default/settings.php
mkdir ${FINAL_DIR}/logs
echo "done."

echo -n "Installing contrib modules & themes in ${FINAL_DIR}/sites/all/modules..."
rm -rf ${FINAL_DIR}/sites/all/modules
git clone git@github.com:julianromerajuarez/drupal-voa3rmodules.git ${FINAL_DIR}/sites/all/modules

rm -rf ${FINAL_DIR}/sites/all/themes
mkdir ${FINAL_DIR}/sites/all/themes
git clone https://github.com/julianromerajuarez/drupal-voa3rtweme.git  ${FINAL_DIR}/sites/all/themes/tweme
echo "done."

echo -n "setting permmissions..."

./setperms.sh -x ${FINAL_DIR}

echo "done."

echo "Further steps:"

echo ""
echo "# (1.) If needed, to create a new database use: 'mysqladmin -uDATABASE_ROOT_USER -p craate NEW_DATABASE'"
echo "# (2.) Copy ${FINAL_DIR} to your server /www/...."
echo "# (3.) Point your browser to http://__X__/install.php to continue proccess" 
echo "# (4.) After installation, run ./conf-voa3r.sh and import newVOA3R database"


