<?php 
  
  abstract class Connection {
    public static function connect() {
      $serverName = "localhost";
      $user = "root";
      $dataBase = "stock";
      $password = "";
    
      try {
        $connectionObj = new PDO("mysql:host=".$serverName.";dbname=".$dataBase.";charset=".'utf8mb4', $user, $password);
        $connectionObj -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(Exception $error) {
        $connectionObj = $error;
      }
      return $connectionObj;
    }
  }