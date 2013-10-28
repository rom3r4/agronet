[drupal-voa3rinstaller](#)
--

Automated Drupal-Commons Profile Installer

Demo
--

A current live snapshot can be seen on http://agronet2.appgee.net (Open-Alpha version)

Requirements
--

- Drush
- Drush Make  
- memcached (Optional)
- APC (Optional)
- Varnish (Optional)
- mongoDB (Optional) 

Verifying Requirements are installed
--

    Drush 
    
    $ sudo drush --version
    drush version 5.9
    
    Drush make
    
    $ sudo drush | grep make
    Other commands: (make)
    make                  Turns a makefile into a working Drupal codebase.
    make-generate         Generate a makefile from the current Drupal site.
      
    
    ( Stop here if your are not using any Optional Requirement )  
    
    
    Memchached (Optional)
    
    $ sudo netstat -lnp | grep memcache
    tcp        0      0 127.0.0.1:11211         0.0.0.0:*               LISTEN      28355/memcached
    udp        0      0 127.0.0.1:11211         0.0.0.0:*                           28355/memcached
    
    Varnish (Optional)
    
    $ sudo netstat -lnp | grep varnish
    tcp        0      0 127.0.0.1:1440          0.0.0.0:*               LISTEN      28679/varnishd
    tcp        0      0 127.0.0.1:1441          0.0.0.0:*               LISTEN      28678/varnishd
    
    APC (Optional)
    
    $ sudo php --ini
    Configuration File (php.ini) Path: /etc/php5/cli
    Loaded Configuration File:         /etc/php5/cli/php.ini
    Scan for additional .ini files in: /etc/php5/cli/conf.d
    Additional .ini files parsed:      /etc/php5/cli/conf.d/10-pdo.ini,
    /etc/php5/cli/conf.d/20-apc.ini,    <--------------
    /etc/php5/cli/conf.d/20-curl.ini,
    /etc/php5/cli/conf.d/20-gd.ini,
    /etc/php5/cli/conf.d/20-memcache.ini,
    /etc/php5/cli/conf.d/20-memcached.ini,
    /etc/php5/cli/conf.d/20-mysql.ini,
    /etc/php5/cli/conf.d/20-mysqli.ini,
    /etc/php5/cli/conf.d/20-pdo_mysql.ini,
    /etc/php5/cli/conf.d/20-xdebug.ini,
    /etc/php5/cli/conf.d/@20-mongo.ini,
    /etc/php5/cli/conf.d/imagick.ini
    
    
    MongoDB (Optional)
    
    $ sudo netstat -lnp | grep mongo
    tcp        0      0 0.0.0.0:28017           0.0.0.0:*               LISTEN      3546/mongod
    tcp        0      0 0.0.0.0:27017           0.0.0.0:*               LISTEN      3546/mongod
    unix  2      [ ACC ]     STREAM     LISTENING     10975    3546/mongod         /tmp/mongodb-
    

Installing Requirements (also Optional Reqs)
--
    (Ubuntu / Debian Linux)
    
    First step
    
    $ sudo apt-get update
    
    Drush and Drush make
    
    $ sudo apt-cache search drush
    drush - command line shell and Unix scripting interface for Drupal
    drush-make - Drupal source code deployment tool
    
    $ sudo apt-get install drush drush-make
    
    Memcached (Optional)
    
    $ sudo apt-get install memcached 
    ...
    ... ? [y/N] y
    
    Varnish (Optional)
    
    $ sudo apt-get install varnish
    ...
    ...? [y/N] y
    
    APC (Optional)
    
    $ sudo apt-get install php-apc
    
    MongoDB
    
    $ sudo apt-get install mongodb-server
    
    
Restarting optional Servers / Services
--

    Memcached
    
    $ sudo service memcached restart
    
    Varnish
    
    $ sudo service varnish restart
    
    APC
    
    $ sudo service apache2 restart
    or
    $ sudo service nginx restart
    
    MongoDB
    
    $ sudo service mongodb restart

Installation
--
    
    Create your database:
    $ sudo mysqladmin -uroot -p create __YOUR_DATABASE__
     
    
    ( Suppose you plan to install VOA3R at /www/agronet)
    $ mkdir /www (if it doesn't exist )
    
    Change directoyry to /tmp
    $ cd /tmp
    $ git clone https://github.com/julianromerajuarez/drupal-voa3rinstaller.git ./__CHOOSE_NAME__
    ...
    
    $ cd ./__CHOOSE_NAME__
    $ ./make-voa3r.sh 
    ...
    
    Copy generated installation to /www/agronet
    $ cp -R ./tmp/__CHOOSE_NAME__ ./tmp/agronet
    
    $ mv ./tmp/agronet /www
    
    Copy scripts to destination directory
    
    $ cd /tmp/newvoa3r
    $ copy *.sh /www/agronet
    $ copy *.ini /www/agronet
    
    
    
    ( Point your browser to http://loacalhost/agronet/install.php --or your url alias--
         and selecct Commons Profile ( you may be asked for your MySQL database 
         credentials: your database name is __YOUR_DATABASE__  -- you can change this in first step

    
    Resquest file, __LATEST_DATABASE__.sql.tar.gz (not provided here)
    $ tar -xzvf ./__LATEST_DATABASE__.sql.tar.gz
    
    $ ls LATEST_DATABASE.sql
    LATEST_DATABASE.sql
    
    
    ( The ommand bellow will load __LATEST_DATABASE__ database into your site )
    $ ./conf-voa3r.sh /www/agronet ./LATEST_DATABASE.sql 
    ...

    ( Check that /www/newvoa3r/sites/default/settings.php contains the same database credentials 
      that you created: database name, user and password )
    ...

    $ ./postinstall __YOUR_SITE_DIRECTORY__
    
    ( remove installation scripts )
    $ cd __YOUR_SITE_DIRECTORY__
    $ rm *.sh
    $ rm *.ini 

    --> This settup comes with MongoDB, memcache, varnish and APC modules enabled by default,
    if you are experimenting issues, try disabling them first. To do so, try:
    
    Change directory  to your site directory (e.g /www/agronet )
    $ cd __YOUR_SITE_DIRECTORY__

    $ drush pm-disable -y varnish
    $ drush pm-disable -y memcache
    
    Disable mongoDB module manually at http://__YOUR_SITE_URL__/admin/modules

    
    Install module upgrades:
    
    Either  with Drush:

    ( from your site directory )
    $ drush cc all
    $ drush updb
    
    Or manually:
    
    Point your browser to: http://__YOR_SITE_URL__/update.php
     

Enabling Varnish & Memcached:
--

    Change directory  to:
    $ cd __YOUR_SITE_DIRECTORY__
   
    $ vi settings.inc 
    --> remove the comments at the beggining and at the end 
      

Upgrading your Drupal Core or your Drupal Commons Core

    Change directory  to:
    $ cd __YOUR_SITE_DIRECTORY__

    Save your database:
    $ drush sql-dump --result-file=/__YOUR_BACKUPS_DIRECTORY__/__YOUR_NEW_LATEST_DATABASE__.sql
    
    Continue with Step 2 of Section Installation (above), use __YOUR_NEW_LATEST_DATABASE__ 
    instead of __LATEST_DATABASE__ (all your data, and articles will be saved)
            

Other projects used
--

- Drupal 7
- Drupal Commons 3
- NGINX / Apache2 + PHP FastCGI + MySQL +  MongoDB
- Apache Solr
- Memcached
- APC
- Varnish
- CDNs
- Bootstrap 2
- Honeypot Captcha
- Tested for Usability
- Tested for Scalability

To-Do List
--

(ToDo Wiki|https://github.com/julianromerajuarez/drupal-voa3rinstaller/wiki/TODO)

Troubleshooting
--

(TroubleShooting Wiki|https://github.com/julianromerajuarez/drupal-voa3rinstaller/wiki/Troubleshooting)

License
--

Copyright University of Alcala. Licensed under GNU/ GPL version 2 License  
