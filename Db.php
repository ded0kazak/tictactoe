<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 24.11.18
 * Time: 0:01
 */
require "predis/src/Autoloader.php";
class Db
{
    public static function Connection(): Predis\Client
    {
        Predis\Autoloader::register();
        $db = null;
        try {
            $db = new Predis\Client();
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
        return $db;
    }

}