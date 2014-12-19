<?php
/**
 * Created by PhpStorm.
 * User: ravish
 * Date: 12/19/14
 * Time: 2:31 PM
 */

namespace KED\Core\DB;

final class Database
{
    protected static $instance = null;
    final private function __construct() {}
    final private function __clone() {}

    /**
     * @return PDO|null
     * @throws \Exception
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            try {
                self::$instance = new \PDO(
                    DB_DSN,
                    DB_USER,
                    DB_PASS
                );
                self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                throw new \Exception(
                    'Database connection could not be established.'.'PDO Error :'.$e->getMessage()
                );
            }
        }
        return self::$instance;
    }

    public static function destroy()
    {
        self::$instance = null;
    }
}