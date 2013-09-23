
if [ "$1" != "-x" ]; then
    echo ""
    echo "CAUTION PLEASE. This script can unrecoverally crash your machine."
    echo "usage: $0 -x <drupal_directory-[no-trailing-slash]>"
    exit
fi

# if [ "$2" == "" ]; then
#   echo "dir cannot be empty"
#   exit
# fi

# if [ $2 == "/" ]; then
#   echo "dir CANNOT be root"
#   exit
# fi

if [ ! -d "$2" ]; then
  echo "dir must be a directory"
  exit
fi

if [ ! -d "$2/sites" ]; then
  echo "dir must contain a valid drupal installaion"
  exit
fi

if [ ! -d "$2/sites/all" ]; then
  echo "dir must contain a valid drupal installaion"
  exit
fi

if [ ! -d "$2/includes" ]; then
  echo "dir must contain a valid drupal installaion"
  exit
fi

if [ ! -f "$2/index.php" ]; then
  echo "dir must contain a valid drupal installaion"
  exit
fi

if [ ! -d "$2/profiles" ]; then
  echo "dir must contain a valid drupal installaion"
  exit
fi

echo ""
echo "Using DIR $2"
echo ""


USER=nginx
GROUP=nginx


echo -n "1. updating permissions recursively ...";
find $2 -type d -exec chmod u=rwx,g=rx,o= '{}' \;
find $2 -type f -exec chmod u=rw,g=r,o= '{}' \;
echo "done";
echo -n "2. updating owner & group recursively ...";
chown -R ${USER}.${GROUP} $2 ;
echo "done";



echo -n "3. updating permissions recursively of 'tmp' directories...";

chmod 777 $2/sites/default/files

find $2/sites/default/files -type d -exec chmod u=rwx,g=rwx,o=rwx '{}' \;
find $2/sites/default/files -type f -exec chmod u=rw,g=rw,o=rw '{}' \;

echo "done";

