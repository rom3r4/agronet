###[agronet](#)

Agronet's Drupal Installation Profile

###Demo Prototype

A current live snapshot can be seen on [on this link](http://agronet.appgee.net)

###Requirements

- xamp(*) (Debian GNU/Linux preferred)
- Git
- [Drush](//github.com/drush-ops/drush) `>= version 6.x``


(*) x=(Windows/Linux/Mac OS)-(Apache/Nginx)-MySQL-PHP

    
###Installation  


(Tested to work on Debian 7 wheezy)


    - Create your database:
    $ sudo mysqladmin -uroot -p create __YOUR_DATABASE_NAME__
     
    $ cd /tmp
    $ git clone https://github.com/julianromera/agronet.git 

    $ cd /tmp/agronet
    $ ./make-agronet.sh 
    
    - Suppose you plan to install Agronet in /www/__YOUR_SITE_NAME__
    
    $ mkdir -p /www/__YOUR_SITE_NAME__ 
    $ cp -R /tmp/agronet/tmp/__YOUR_SITE_NAME__ /www 
    

    - Copy scripts to destination directory
    
    $ cd /tmp/agronet
    $ copy *.sh /www/__YOUR_SITE_NAME__
    $ copy *.ini /www/__YOUR_SITE_NAME__
    
    - Auto-install site
    
    $ cd /www/__YOUR_SITE_NAME__ 
    $ sudo drush site-install commons --account-name=admin --account-pass=admin
    --db-url=mysql:/__MYSQLUSER__:__MYSQLPASSWORD__@localhost/__YOUR_DATABASE_NAME__

    - Install database
    
    $ wget https://github.com/julianromera/agronet-database/raw/master/agronet-db.sql.tar
    $ tar -xzvf agronet-db.sql.tar
    
    $ cd /www/__YOUR_SITE_NAME__
    $ ./conf-agronet.sh /www/agronet ./agronet-db.sql 

    - Check that /www/__YOUR_SITE_NAME__/sites/default/settings.php contains the same database 
      credentials that you created: database name, user and password

    $ cd /www/__YOUR_SITE_NAME__
    $ ./postinstall /www/__YOUR_SITE_NAME__
    
    --------- THIS WILL BE CHANGED ON NEXT UPDATE ---------
    
    - This setup comes with MongoDB, memcache, varnish and APC modules enabled by default,
    if you are experimenting issues, try disabling them first:
    
    $ cd /www/__YOUR_SITE_NAME__
    $ drush pm-disable -y varnish
    $ drush pm-disable -y memcache
    
    - Disable mongoDB module manually at http://__YOUR_SITE_URL__/admin/modules

    - Install module upgrades:
    
    a. Using Drush:

    $ cd /www/__YOUR_SITE_NAME__ 
    $ drush cc all
    $ drush updb
    
    b. Or manually:
    
    Point your browser to: http://__YOR_SITE_URL__/update.php
     

###Resources

- [Drupal 7](https://drupal.org/drupal-7.0)
- [Drupal Commons 3](http://www.acquia.com/demo-drupal-commons-3)
- [NGINX]() / [Apache2]() + [PHP5 FastCGI]() + [MySQL]() + [MongoDB]()
- [Apache Solr](http://lucene.apache.org/solr/)
- [Memcached](http://memcached.org/)
- [APC](http://en.wikipedia.org/wiki/List_of_PHP_accelerators)
- [Varnish](https://www.varnish-cache.org/)
- [CDN](http://en.wikipedia.org/wiki/Content_delivery_network)
- [Bootstrap 2](http://getbootstrap.com/2.3.2/)
- [Honeypot Captcha](http://en.wikipedia.org/wiki/Honeypot_(computing))
- Usability Tests
- [Scalability Tests](https://github.com/julianromerajuarez/apachesolr-benchs)


###Troubleshooting

[TroubleShooting Wiki](https://github.com/julianromera/agronet/wiki/Troubleshooting)

###Author

University of Alcala

###License

Licensed under GPL/ GNU version 2 License. For more information, 
see the accompanying LICENSE file.  


