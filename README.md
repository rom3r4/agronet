[drupal-voa3rinstaller](#)
--

New-Voa3r (AgroNet) Intaller script

Site Demo
--

A current live snapshot can be seen on http://agronet.appgee.net (Open-Alpha version)

Requirements
--

- Drush
- memcached (optative)
- PHP APC (optative)
- Varnish (optative)
- mongoDB (optative) 

Installation
--
    
    ( Prepare your database )
    $ sudo mysqladmin -uroot -p create newvoa3r
     
    
    ( Suppose plan to you install VOA3R at /www/newvoa3r)
    $ mkdir /www (if it doesn't exist )
    $ cd /www
    $ git clone https://github.com/julianromerajuarez/drupal-voa3rinstaller.git ./newvoa3r
    $ cd ./newvoa3r
    $ ./make-voa3r.sh 
    
    ( point your browser to http://loacalhost/newvoa3r/install.php y selecct Commons Profile ( you may 
         be asked for your MySQL database credentials: your database name is 'newvoa3r' 
         -- you can change with first step --)

    (once you finish previous steps)
    $ wget newvoa3r.appgee.net/LASTEST_DATABASE.sql.tar.gz (request file first)
    $ tar -xzvf ./LATEST_DATABASE.sql.tar.gz
    
    ( This command will automatically load database into your Drupal setup )
    $ ./conf-voa3r.sh /www/newvoa3r ./LATEST_DATABASE.sql 

    ( Last, check that /www/newvoa3r/sites/default/settings.php 

    HEADS UP: This settup comes with MongoDB, memcache, varnish and APC modules enabled by default,
    if you are experimenting issues, try disabling them first. To do so, try:
    
    (from your drupal directory)
    $ drush pm-disable -y varnish
    $ drush pm-disable -y memcache
    ( mongoDB should be disabled manually )

    If you have those services installed on your server, you can try tweaking file
    /www/newvoa3r/sites/default/include.php and speedup you Drupal Setup 
    
   


Technologies
--

- Drupal 7
- Drupal Commons 3
- NGINX + PHP FastCGI + MySQL
- Apache Solr
- MongoDB
- Memcached
- PHP APC
- Varnish
- CDNs
- Modified Bootstrap 2 Theme (Tweme) 
- tested for Usability
- tested for Scalability


Troubleshoting
--


License
--

Copyright University of Alcala. Licensed under GNU/ GPL version 2 License  
