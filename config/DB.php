<?php

namespace Config;

class DB
{
    public static function connection()
    {
        $con = new \PDO("mysql:host=localhost;dbname=buycontrol;charset=utf8","root","root");
        return $con;
    }
}
