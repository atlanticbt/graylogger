<?php
namespace Graylogger;

/** Static helper class to wrap PSR-compliant GELF logger. */
class Graylogger {
    
    // Defaults
    const HOST = '127.0.0.1';
    const PORT = 12201;
    const FACILITY = 'Graylogger';
    const LEVEL = 'debug';

    /**
     * Returns a PSR-3 compliant logger.
     * @return \Psr\Log\LoggerInterface
     */
    public static function getLogger($host = self::HOST, $port = self::PORT, $facility = self::FACILITY) {
        $transport = new \Gelf\Transport\UdpTransport($host, $port);
        $publisher = new \Gelf\Publisher($transport);
        return new \Gelf\Logger($publisher, $facility);
    }

    /**
     * Publishes a message to a Graylog/GELF server
     * @param mixed $message
     * @param string $host
     * @param int $port
     * @param string $facility
     * @param string $level
     */
    public static function log($message, $host = self::HOST, $port = self::PORT, $facility = self::FACILITY, $level = self::LEVEL) {
        $logger = self::getLogger($host, $port, $facility);
        $logger->log($level, $message);
    }
    
}
