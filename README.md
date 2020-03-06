# quick-note
[![Waffle.io - Columns and their card count](https://badge.waffle.io/danielHPeters/QuickNote.svg?columns=all)](http://waffle.io/danielHPeters/QuickNote)
## About
Manage your Notes  
Add notes on the fly.

## Prerequisites
- Requires PHP 7.4.3.
- Composer
- Optional web server (Nginx, Apache2 etc.)

## Installation
1. Clone this project with its submodules.
2. Open the project folder in a terminal and run `composer install`.

##
For development, you can use the serve (Unix) or serve.bat (Windows) files to test the applicatio.
If you want to serve the project via a web server, then you must either set the server document root to the project
directory or configure a virtual host pointing to the project directory (Make sure your web server has at least read access
to the directory content and write access to the `logs` directory).

### Sample apache2 virtual host config
````
<VirtualHost *>
    DocumentRoot "PATH_TO_PROJECT/guick-note/public"
    ServerName quicknote.localhost
    DirectoryIndex index.php

    <Directory "PATH_TO_PROJECT/quick-note/public">
        Options Indexes FollowSymLinks Includes
        AllowOverride All
        Order allow,deny
        Allow from all
        Require all granted
    </Directory>
</VirtualHost>
````
The page will be available via `quicknote.localhost`.
