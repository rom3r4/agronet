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


    --> Create your database:
    $ sudo mysqladmin -uroot -p create __YOUR_DATABASE__
     
    
    --> Suppose you plan to install Agronet at /www/agronet
    $ mkdir /www (if it doesn't exist )
    
    $ cd /tmp
    $ git clone https://github.com/julianromera/agronet.git ./__TMP_NAME__

    $ cd ./__TMP_NAME__
    $ ./make-agronet.sh 

    --> Copy generated installation to /www/__YOUR_SITE_NAME__ (e.g /www/agronet )
    $ cp -R ./tmp/__TMP_NAME__ ./tmp/__YOUR_SITE_NAME__ 
    
    $ mv ./tmp/__YOUR_SITE_NAME__ /www
    
    --> Copy scripts to destination directory
    
    $ cd /tmp/__TMP_NAME__
    $ copy *.sh /www/__YOUR_SITE_NAME__
    $ copy *.ini /www/__YOUR_SITE_NAME__
    
    
    $ cd /www/__YOUR_SITE_NAME__ 
    $ sudo drush site-install comons --account-name=admin --account-pass=admin
    --db-url=mysql:/__MYSQLUSER__:__MYSQLPASSWORD__@localhost/__YOUR_DATABASE__

    $ wget https://github.com/julianromera/agronet-database/raw/master/agronet-db.sql.tar
    $ tar -xzvf agronet-db.sql.tar
    
    $ ls agronet-db.sql
    agronet-db.sql
    
    
    --> The command bellow will load ``agronet-db.sql`` database into your site
    $ ./conf-agronet.sh /www/agronet ./agronet-db.sql 

    --> Check that /www/__YOUR_SITE_NAME__/sites/default/settings.php contains the same database 
      credentials that you created: database name, user and password

    $ ./postinstall __YOUR_SITE_DIRECTORY__
    
    --> remove installation scripts
    $ cd __YOUR_SITE_DIRECTORY__
    $ rm *.sh
    $ rm *.ini 

    --> This settup comes with MongoDB, memcache, varnish and APC modules enabled by default,
    if you are experimenting issues, try disabling them first. To do so, try:
    

    $ cd __YOUR_SITE_DIRECTORY__
    $ drush pm-disable -y varnish
    $ drush pm-disable -y memcache
    
    Disable mongoDB module manually at http://__YOUR_SITE_URL__/admin/modules

    Install module upgrades:
    
    - Either with Drush:

    $ cd __YOUR_SITE_DIRECTORY__ 
    $ drush cc all
    $ drush updb
    
    Or 
    - Manually:
    
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


