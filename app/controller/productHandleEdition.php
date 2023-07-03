<?php
  include_once "../model/dbProduct.php";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $props = [];
    foreach ($dataParams as $dataParam) {
      $dataParam["inputValue"] =  $_POST[$dataParam["postName"]];
      $props[] = $dataParam;
    }
    Product::editProduct($props, $_POST["ProdID"]);
  }

