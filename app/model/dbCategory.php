<?php 
  include_once "connection/dbConnection.php";

  abstract class Category {
    public static function listCategories() {
      try {
        $responseObj = Connection::connect()->prepare("SELECT * FROM categories;");
        $responseObj->execute();
        $userList = $responseObj->fetchAll(PDO::FETCH_ASSOC);
        $responseObj = null;
      } catch (Exception $error) {
        $userList = "";
        echo $error;
      }

      return $userList;
    }


  }

?>