<?php
  include_once "../model/dbProduct.php";

  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $obj = Product::listProducts();
    header('Content-Type: application/json');
    http_response_code(200);
    echo json_encode($obj);
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $props = [];
    foreach ($dataParams as $dataParam) {
      $dataParam["inputValue"] =  $_POST[$dataParam["postName"]];
      $props[] = $dataParam;
    }
    Product::createProduct($props);
  }
