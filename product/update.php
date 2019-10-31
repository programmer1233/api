<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


include_once '../config/database.php';
include_once '../objects/product.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

$data = json_decode(file_get_contents("php://input"));

$product->id = $data->id;

$product->name = $data->name;
$product->price = $data->price;
$product->description = $data->description;
$product->factory_id = $data->factory_id;

if($product->update()){

    http_response_code(200);

    echo json_encode(array("message" => "Product was updated."));
}

else{

    http_response_code(503);

    echo json_encode(array("message" => "Unable to update product."));
}

 ?>
