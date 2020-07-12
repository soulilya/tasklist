<?php
class Db
{
    private static $connection;
    private static $settings = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_EMULATE_PREPARES => false,
    );

    public static function connect($host, $user, $password, $database)
    {
        if (!isset(self::$connection))
        {
            self::$connection = @new PDO(
                "mysql:host=$host;dbname=$database",
                $user,
                $password,
                self::$settings
            );
        }
    }

    public static function queryOne($query, $params = array())
    {
        $result = self::$connection->prepare($query);
        $result->execute($params);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function queryAll($query, $params = array())
    {
        $result = self::$connection->prepare($query);
        $result->execute($params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function execute($sql, $params = []) {
        $stmt = self::$connection->prepare($sql);
        return $stmt->execute($params);
    }
}
