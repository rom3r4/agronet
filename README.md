[drupal-voa3rinstaller](#)
--

New-Voa3r (AgroNet) Intaller script

Site Demo
--

A current live snapshot can be seen on http://agronet.appgee.net (Open-Alpha version)

Requirements
--

- Drush
- Drush make  
- memcached (optative)
- PHP APC (optative)
- Varnish (optative)
- mongoDB (optative) 

Verify Requirements
--

    Drush 
    
    $ sudo drush --version
    drush version 5.9
    
    Drush make
    
    $ sudo drush | grep make
    Other commands: (make)
    make                  Turns a makefile into a working Drupal codebase.
    make-generate         Generate a makefile from the current Drupal site.
      
    Memchached (Optative)
    
    $ sudo netstat -lnp | grep memcache
    tcp        0      0 127.0.0.1:11211         0.0.0.0:*               LISTEN      28355/memcached
    udp        0      0 127.0.0.1:11211         0.0.0.0:*                           28355/memcached
    
    Varnish (Optative)
    
    $ sudo netstat -lnp | grep varnish
    tcp        0      0 127.0.0.1:1440          0.0.0.0:*               LISTEN      28679/varnishd
    tcp        0      0 127.0.0.1:1441          0.0.0.0:*               LISTEN      28678/varnishd
    
    APC (Optative)
    
    $ sudo php --ini
    Configuration File (php.ini) Path: /etc/php5/cli
    Loaded Configuration File:         /etc/php5/cli/php.ini
    Scan for additional .ini files in: /etc/php5/cli/conf.d
    Additional .ini files parsed:      /etc/php5/cli/conf.d/10-pdo.ini,
    /etc/php5/cli/conf.d/20-apc.ini,    <------------------------------------------------
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
    
    
    MongoDB (Optative)
    
    $ sudo netstat -lnp | grep mongo
    tcp        0      0 0.0.0.0:28017           0.0.0.0:*               LISTEN      3546/mongod
    tcp        0      0 0.0.0.0:27017           0.0.0.0:*               LISTEN      3546/mongod
    unix  2      [ ACC ]     STREAM     LISTENING     10975    3546/mongod         /tmp/mongodb-27017.sock
    

Requirements Installation
--
    (Ubuntu / Debian Linux)
    
    First step
    
    $ sudo apt-get update
    
    Drush and Drush make
    
    $ sudo apt-cache search drush
    drush - command line shell and Unix scripting interface for Drupal
    drush-make - Drupal source code deployment tool
    
    $ sudo apt-get install drush drush-make
    
    Memcached (Optative)
    
    $ sudo apt-get install memcached 
    ...
    ... ? [y/N] y
    
    Varnish (Optative)
    
    $ sudo apt-get install varnish
    ...
    ...? [y/N] y
    
    APC (Optative)
    
    $ sudo apt-get install php-apc
    
    MongoDB
    
    $ sudo apt-get install mongodb-server
    
    
Test/Restart Requitements 
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
    
    ( Prepare your database )
    $ sudo mysqladmin -uroot -p create __YOUR_DATABASE__
     
    
    ( Suppose you plan to install VOA3R at /www/newvoa3r)
    $ mkdir /www (if it doesn't exist )
    $ cd /www
    $ git clone https://github.com/julianromerajuarez/drupal-voa3rinstaller.git ./newvoa3r
    $ cd ./newvoa3r
    $ ./make-voa3r.sh 
    
    ( Point your browser to http://loacalhost/newvoa3r/install.php y selecct Commons Profile ( you may 
         be asked for your MySQL database credentials: your database name is 'newvoa3r' 
         -- you can change this in first step --)

    ( Once you finish previous steps )
    $ wget newvoa3r.appgee.net/LASTEST_DATABASE.sql.tar.gz (request file first)
    $ tar -xzvf ./LATEST_DATABASE.sql.tar.gz
    
    ( This command will automatically load LATEST_DATABASE database into your Drupal setup )
    $ ./conf-voa3r.sh /www/newvoa3r ./LATEST_DATABASE.sql 

    ( Last, check that /www/newvoa3r/sites/default/settings.php contains the same database credentials 
      that you created )

    HEADS UP: This settup comes with MongoDB, memcache, varnish and APC modules enabled by default,
    if you are experimenting issues, try disabling them first. To do so, try:
    
    ( From your drupal directory )
    $ drush pm-disable -y varnish
    $ drush pm-disable -y memcache
    ..
    ( mongoDB should be disabled manually )

    If you have those Services (Mamceched, varnish, etc.) installed on your Server, you can try tweaking file
    /www/newvoa3r/sites/default/include.php to increase you Drupal Setup performance 
    
   


Technologies used
--

- Drupal 7
- Drupal Commons 3
- NGINX + PHP FastCGI + MySQL +  MongoDB
- Apache Solr
- Memcached
- PHP APC
- Varnish
- CDNs
- Twitter Bootstrap 2 
- Honeypot Captcha 
- Tested for Usability
- Tested for Scalability

To-Do List
--

https://github.com/julianromerajuarez/drupal-voa3rinstaller/wiki/TODO

Troubleshooting
--

https://github.com/julianromerajuarez/drupal-voa3rinstaller/wiki/Troubleshooting

License
--

Copyright University of Alcala. Licensed under GNU/ GPL version 2 License  
