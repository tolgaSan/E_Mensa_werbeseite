# Routingscript MVC

little routing script for use in DBWT

intended to run with only one dependency (bladeone).

## usage

* start this script by either executing `start_server.bat` or running `php -S 127.0.0.1:9000 -t public` in a shell from the project´s root directory.

* [open the website](http://127.0.0.1:9000/)

## folder overview

* `bin/` is only necessary if you need to use composer and dont have it installed already
* `config/` holds configuration files
* `controllers/` contains all Controller Classes
* `models/` contains the Model Classes
* `public/` is the web root for your http server and contains the routing script itself, next to resources that will be accessible by http clients (css, js, images, etc.)
* `storage/` is necessary to hold Blade Cache Files  
* `views/` holds all View Files

