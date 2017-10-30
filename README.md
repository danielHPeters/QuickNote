# QuickNote
[![Waffle.io - Columns and their card count](https://badge.waffle.io/danielHPeters/QuickNote.svg?columns=all)](http://waffle.io/danielHPeters/QuickNote)
## About
Manage your Notes  
Add notes on the fly.

## Installation
Requires PHP 7.1 and Apache2  
Use XAMPP for easy configuration  
Add the following to the end of apache/conf/httpd.conf
````
<VirtualHost *>
    DocumentRoot "XAMMP_INSTALL_DIR/htdocs"
    ServerName localhost
</VirtualHost>
<VirtualHost *>
    DocumentRoot "PATH_TO_PROJECT/QuickNote/public"
    ServerName quicknote.localhost
    DirectoryIndex index.php

    <Directory "PATH_TO_PROJECT/QuickNote/public">
        Options Indexes FollowSymLinks Includes
        AllowOverride All
        Order allow,deny
        Allow from all
        Require all granted
    </Directory>
</VirtualHost>

