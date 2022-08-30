<?php

namespace app\Connection;
use PDO;
use PDOException;



class Connection {
  private static $connect = null;

  public static function getConnection()
  {

    try {
      
      if(!self::$connect) {
        self::$connect = new PDO("mysql:host=localhost;dbname={$_ENV['DATABASE_NAME']}", $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASSWORD'],[
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ]);
      }
  
      return self::$connect;

    } catch (PDOException $th) {
      echo $th->getMessage();
    }
    
  }
}