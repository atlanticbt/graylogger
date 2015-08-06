<?php
require_once __DIR__ . '/../vendor/autoload.php';

// Set Global Facade
class Graylogger extends \Graylogger\Graylogger {}

// Prevent CLI handling if loaded another way
if(PHP_SAPI != 'cli') return;


$cmd = new \Commando\Command();

$cmd->setHelp('A simple CLI executable for sending a message to a Graylog server using PHP.');

$cmd->option()->require()->referToAs('message')->description('The log message.');
$cmd->option('f')->aka('facility')->default(Graylogger::FACILITY)->description('The log facility. Default: '.Graylogger::FACILITY);
$cmd->option('l')->aka('level')->default(Graylogger::LEVEL)->description('The log level, per PSR-7. Default: '.Graylogger::LEVEL);
$cmd->option('h')->aka('host')->default(Graylogger::HOST)->description('The Graylog server host. Default: '.Graylogger::HOST);
$cmd->option('p')->aka('port')->default(Graylogger::PORT)->description('The Graylog server port. Default: '.Graylogger::PORT);

Graylogger::log($cmd[0], $cmd['host'], $cmd['port'], $cmd['facility'], $cmd['level']);
