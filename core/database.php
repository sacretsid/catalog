<?php


namespace Core;

use PDO;
use PDOStatement;

/**
 * Class Database
 * @package Core
 */
class Database
{
    /** @var null|PDOStatement */
    protected static $instance = null;

    public function __construct()
    {
    }

    public function __clone()
    {
    }

    /**
     * @return PDO|null
     */
    public static function instance()
    {
        if (self::$instance === null) {
            $opt = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => true,
            );
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHAR;
            self::$instance = new PDO($dsn, DB_USER, DB_PASS, $opt);
        }
        return self::$instance;
    }

    /**
     * @param string $method
     * @param array $args
     * @return mixed
     */
    public static function __callStatic(string $method, array $args)
    {
        return call_user_func_array(
            array(
                self::instance(),
                $method,
            ),
            $args
        );
    }

    /**
     * @param string $sql
     * @param array $args
     * @return bool|false|PDOStatement
     */
    public static function run(string $sql, array $args = [])
    {
        if (!$args) {
            return self::instance()->query($sql);
        }
        $stmt = self::instance()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    /**
     * @param string $table
     * @param string $fields
     * @return array|null
     */
    public function get(string $table, $fields = '*')
    {
        if (!empty($table)) {
            return self::run('SELECT ' . $fields . ' FROM ' . $table)->fetchAll(PDO::FETCH_KEY_PAIR);
        } else {
            return null;
        }
    }
}