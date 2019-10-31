<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


include_once '../config/database.php';
include_once '../objects/factory.php';

$database = new Database();
$db = $database->getConnection();

$factory = new Factory($db);

$data = json_decode(file_get_contents("php://input"));

$factory->id = $data->id;

if($factory->delete()){

  echo json_encode(
    array('message' => 'Factory Deleted')
  );
}

else{

  echo json_encode(
    array('message' => 'Factory Not Deleted')
  );
}
?>
