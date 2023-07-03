<?php
  include_once "../model/dbCategory.php";

  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $obj = Category::listCategories();
    header('Content-Type: application/json');
    http_response_code(200);
    echo json_encode($obj);
  }
  