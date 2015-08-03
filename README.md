# PHP Graylogger 

A simple executable for sending a message to a Graylog server using PHP via CLI.


## Usage

`php graylogger.phar <message>`

Use `--help` to see all the available arguments and their defaults.


## Compiling

Requires [Composer](https://getcomposer.org/download/). The essential files are `box.json`, `composer.json`, and `graylogger.php`. 

Running `composer update` in a folder with these files will automatically pull all dependencies and build the phar.


## License

GPLv3