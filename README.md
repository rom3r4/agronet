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
- Honeypot Captcha (For Usability Reasons)
- tested for Usability
- tested for Scalability

To-Do List
--

https://github.com/julianromerajuarez/drupal-voa3rinstaller/wiki/TODO

Troubleshooting
--

https://github.com/julianromerajuarez/drupal-voa3rinstaller/wiki/Troubleshooting

License
--

Copyright University of Alcala. Licensed under GNU/ GPL version 2 License  
