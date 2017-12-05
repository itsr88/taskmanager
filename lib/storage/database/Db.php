<?php

namespace Lib\Storage\Database;

class Db
{
    function __construct()
    {
    }

    public static function getConnect(){
        $dsn = "mysql:host=127.0.0.1;dbname=taskmanager;charset=utf8";
        return new \PDO($dsn, "root", "hipeople88");

    }
}