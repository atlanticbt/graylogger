# PHP Graylogger

A simple CLI-compatible PHP library for sending a message to a Graylog server.

## Usage
_Note: The example commands assume graylogger.phar is in your current directory or PATH._

#### via CLI
`php graylogger.phar <message>`

**\<message\>**: Required. The log message.  
**-f** or **--facility**: The log facility. (Default: Graylogger)  
**-h** or **--host**: The Graylog server host. (Default: 127.0.0.1)  
**-l** or **--level**: The log level, per PSR-7. (Default: debug) 

Use **--help** to print all available arguments and their descriptions.

#### via Include
    include graylogger.phar  
    Graylogger::log($message); // Use with all possible defaults  
    Graylogger::log($message, $host, $port, $facility, $level); // Use with custom options  
    Graylogger::getLogger($host, $port, $facility)->error($message); // Use as PSR-3 Logger  


## Compiling
Requires [Composer](https://getcomposer.org/download/) and [Box](https://github.com/box-project/box2). 
Box is included for convenience. You may need to make _box.phar_ executable.

Get Latest Composer: `curl -sS https://getcomposer.org/installer | php`  
Get Latest Box: `curl -LSs http://box-project.org/installer.php | php`

Running `composer update` will automatically pull all dependencies and execute `php box.phar build` to build the phar.


## Legal
&copy; 2015 AtlanticBT. Released under the [GPLv3](http://www.gnu.org/licenses/gpl-3.0.html) license. 