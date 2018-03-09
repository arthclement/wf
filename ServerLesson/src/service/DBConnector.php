<?php
namespace Service;

class DBConnector {
    private static $config;
    private static $connection;

    public static function setConfig(array $config) {
        $dsn = \sprintf(
                '%s:host=%s;dbname=%s',
                $config['driver'],
                $config['host'],
                $config['dbname']
        );
        
        self::$config = [
            'dsn' => $dsn,
            'dbuser' => $config['dbuser'],
            'dbpass' => $config['dbpass']
        ];

        return;
    }
    
    private static function createConnection() {
        if (!self::$config) {
            throw new \RuntimeException('The configuration is empty, run setConfig()');
            return;
        }
        self::$connection = new \PDO(self::$config['dsn'], self::$config['dbuser'], self::$config['dbpass']);
    }
    
    public static function getConnection() {
        if (!self::$connection) {
            self::createConnection();
        }

        return self::$connection;
    }
}