<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/factory.php';

$database = new Database();
$db = $database->getConnection();

$factory = new Factory($db);

$stmt = $factory->read();
$num = $stmt->rowCount();


if($num > 0){

    $factories_arr = array();
    $factories_arr["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $factory_item = array(
            "id" => $id,
            "name" => $name
        );

        array_push($factories_arr["records"], $factory_item);
    }

    http_response_code(200);

    echo json_encode($factories_arr);
}

else{

    http_response_code(404);

    echo json_encode(
        array("message" => "No factoires found.")
    );
}
 ?>
