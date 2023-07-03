<?php 
  include_once "connection/dbConnection.php";

  $dataParams = [["postName" => "ProdName", "dbName" => "name_Product"],
                ["postName" => "ProdStock", "dbName" => "stock_Product"],
                ["postName" => "CatagoryID", "dbName" => "category_Product"]
  ];

  abstract class Product {

    public static function listProducts() {
      try {
        $responseObj = Connection::connect()->prepare("SELECT * FROM product INNER JOIN categories ON product.category_Product=categories.id_Category;");
        $responseObj->execute();
        $userList = $responseObj->fetchAll(PDO::FETCH_ASSOC);
        $responseObj = null;
      } catch (Exception $error) {
        $userList = "";
        echo $error;
      }

      return $userList;
    }

    public static function createProduct($props) {
      try {
        $responseObj = Connection::connect()->prepare("INSERT INTO product(name_Product,stock_Product,category_Product) VALUES(:name_Product,:stock_Product,:category_Product);");
        foreach ($props as $prop) {
          $responseObj -> bindParam(":".$prop["dbName"], $prop["inputValue"]);
        }
        $responseObj->execute();
      } catch (Exception $error) {
        echo json_encode($error);
      }
    }

    public static function editProduct($props, $prodID) {

      try {
        $responseObj = Connection::connect()->prepare("UPDATE product SET name_Product=:name_Product, stock_Product=:stock_Product, category_Product=:category_Product WHERE id_Product=:id_Product;");
        foreach ($props as $prop) {
          $responseObj -> bindParam(":".$prop["dbName"], $prop["inputValue"]);
        }
        $responseObj -> bindParam(":id_Product", $prodID);
        $responseObj->execute();
      } catch (Exception $error) {
        echo json_encode($error);
      }

    }

    public static function deleteProduct($prodID) {
      try {
        $responseObj = Connection::connect()->prepare("DELETE FROM product WHERE id_Product=:id_Product;");
        $responseObj -> bindParam(":id_Product", $prodID);
        $responseObj->execute();
      } catch (Exception $error) {
        echo json_encode($error);
      }
    }

  }

?>