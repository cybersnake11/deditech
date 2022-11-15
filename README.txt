Hi, to run the code you'll need at least PHP version 7.4 installed locally, if you don't, hopefully you have docker installed.
This app runs on port 3005, so please make sure this port is available.

- If you have PHP installed locally, open terminal, navigate to the current project directory and execute: php -S localhost:3005
If you don't have PHP installed, but have docker, open terminal, navigate to current project directory and execute the following line:
docker run --rm -d --name php_is_best -p 3005:3005 -v $PWD:/var/www/html php:8.1.8-fpm php -S 0.0.0.0:3005

- Open any browser (chrome) preferable, navigate to http://localhost:3005/ or http://0.0.0.0:3005/ the app should open without issues

- To stop docker container, execute following line and wait for ~7 sec:
docker stop php_is_best

- Enjoy!

