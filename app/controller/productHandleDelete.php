<?php
  include_once "../model/dbProduct.php";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    Product::deleteProduct($_POST["ProdID"]);
  }
