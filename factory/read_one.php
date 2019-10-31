<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


include_once '../config/database.php';
include_once '../objects/factory.php';

$database = new Database();
$db = $database->getConnection();

$factory = new Factory($db);

$factory->id = isset($_GET['id']) ? $_GET['id'] : die();

$factory->readOne();

$factory_arr = array(
  'id' => $factory->id,
  'name' => $factory->name
);

print_r(json_encode($factory_arr))
?>
