###[drupal-voa3rinstaller](#)

Agronet's Drupal Installation Profile

###Demo Prototype

A current live snapshot can be seen on [on this link](http://agronet2.appgee.net)

###Requirements

- xamp or xemp(*) (Debian GNU/Linux Lemp preferred)
- Drush
- Drush Make  

(*) x=(Windows/Linux/mac)-a,e=(Apache/Nginx)-MySQL-PHP

    
###Installation  


(Tested to work on Debian 7 wheezy)


    Create your database:
    $ sudo mysqladmin -uroot -p create __YOUR_DATABASE__
     
    
    ( Suppose you plan to install VOA3R at /www/agronet)
    $ mkdir /www (if it doesn't exist )
    
    Change directoyry to /tmp
    $ cd /tmp
    $ git clone https://github.com/julianromerajuarez/drupal-voa3rinstaller.git ./__TMP_NAME__
    ...
    
    $ cd ./__TMP_NAME__
    $ ./make-voa3r.sh 
    ...
    
    Copy generated installation to /www/__YOUR_SITE_NAME__ (e.g /www/agronet )
    $ cp -R ./tmp/__TMP_NAME__ ./tmp/__YOUR_SITE_NAME__ 
    
    $ mv ./tmp/__YOUR_SITE_NAME__ /www
    
    Copy scripts to destination directory
    
    $ cd /tmp/__TMP_NAME__
    $ copy *.sh /www/__YOUR_SITE_NAME__
    $ copy *.ini /www/__YOUR_SITE_NAME__
    
    
    
    ( Point your browser to http://loacalhost/agronet/install.php --or your url alias--
         and selecct Commons Profile ( you may be asked for your MySQL database 
         credentials: your database name is __YOUR_DATABASE__  -- you can change this in first step

    
    Resquest file, __LATEST_DATABASE__.sql.tar.gz ( not provided here )
    $ tar -xzvf ./__LATEST_DATABASE__.sql.tar.gz
    
    $ ls __LATEST_DATABASE__.sql
    __LATEST_DATABASE__.sql
    
    
    ( The ommand bellow will load __LATEST_DATABASE__ database into your site )
    $ ./conf-voa3r.sh /www/agronet ./__LATEST_DATABASE__.sql 
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
     

      

###Upgrading Drupal or Drupal-Commons Core


    Change directory  to:
    $ cd __YOUR_SITE_DIRECTORY__

    Save your database:
    $ drush sql-dump --result-file=/__YOUR_BACKUPS_DIRECTORY__/__YOUR_NEW_LATEST_DATABASE__.sql
    
    Continue with Step 2 of Section Installation (above), use __YOUR_NEW_LATEST_DATABASE__ 
    instead of __LATEST_DATABASE__ (all your data, and articles will be saved)
            

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

[TroubleShooting Wiki](https://github.com/julianromerajuarez/drupal-voa3rinstaller/wiki/Troubleshooting)

###Author

University of Alcalá

###License

Licensed under GNU/ GPL version 2 License  
