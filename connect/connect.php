<?php

require_once('config.php');

class DB {


  public static $pdo  = null;
  public static $stmt = null;

  const OPT = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false
  ];

  public static function start(){
    if (self::$pdo === null){
      $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME. ';charset='.CHARSET;
      self::$pdo = new PDO($dsn, DB_USER, DB_PASSWORD, self::OPT);
    }
    return self::$pdo;
  }

  public static function destroy(){	
		self::$pdo = null;
		return self::$pdo; 
	}

  public static function connect($sql, $args = []){
    if (!$args){
      return self::start()->query($sql);
    }

    $stmt = self::start()->prepare($sql);
    $stmt->execute($args);
    foreach ($args as $elem) {
    }
    return $stmt;
  }

}
