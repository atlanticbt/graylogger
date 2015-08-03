#!/usr/bin/env php
<?php
require_once __DIR__ . '/vendor/autoload.php';

$cmd = new \Commando\Command();

$cmd->setHelp('A simple executable for sending a message to a Graylog server using PHP via CLI.');

$cmd->option()->require()->referToAs('message')->description('The message to log.');
$cmd->option('f')->aka('facility')->default(null)->description('Default: null. The Graylog facility for the message.');
$cmd->option('l')->aka('level')->default('debug')->description('Default: debug. The log level of the message, per PSR-7. Ranges from debug to emergency.');
$cmd->option('h')->aka('host')->default('127.0.0.1')->description('Default: 127.0.0.1. The Graylog server host.');
$cmd->option('p')->aka('port')->default(12201)->description('Default: 12201. The Graylog server port.');

$transport = new \Gelf\Transport\UdpTransport($cmd['host'], $cmd['port']);
$publisher = new \Gelf\Publisher();
$publisher->addTransport($transport);
$logger = new \Gelf\Logger($publisher, $cmd['facility']);
$logger->log($cmd['level'], $cmd[0]);