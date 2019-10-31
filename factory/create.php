<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


include_once '../config/database.php';
include_once '../objects/factory.php';

$database = new Database();
$db = $database->getConnection();

$factory = new Factory($db);

$data = json_decode(file_get_contents("php://input"));


$factory->name = $data->name;


  if($factory->create()) {

    http_response_code(201);

    echo json_encode(array("message" => "Factory was created."));
  }
  else {

    http_response_code(503);

    echo json_encode(array("message" => "Unable to create factory."));
  }



 ?>
