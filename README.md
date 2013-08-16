#php_public_ip
***Return the HTTP client ip address (public ip) via HTTP in different formats***

This web application uses [Silex](http://silex.sensiolabs.org/) (The PHP micro-framework based on the [Symfony2](http://symfony2.com) Components)

##Configuration

Consult this page for your webserver configuration: http://silex.sensiolabs.org/doc/web_servers.html and set the /path/to/app to the patch to the web folder in the root of this repository.

##Requirements

Silex works with PHP 5.3.3 or later.

##Usage

###TEXT
The URLs exemple.com and exemple.com/text will return the public ip address in raw text.

###JSON
The URL exemple.com/json will return the public ip address in JSON.

##Features to add
- GeoIP location in JSON
