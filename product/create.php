<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../config/database.php';
include_once '../objects/product.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

$data = json_decode(file_get_contents("php://input"));


$product->name = $data->name;
$product->price = $data->price;
$product->description = $data->description;
$product->factory_id = $data->factory_id;
$product->created = date('Y-m-d H:i:s');

  if($product->create()) {

    http_response_code(201);

    echo json_encode(array("message" => "Product was created."));
  }
  else {

    http_response_code(503);

    echo json_encode(array("message" => "Unable to create product."));
  }



 ?>
