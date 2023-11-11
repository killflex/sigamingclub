<?php 

error_reporting(0);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('function.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];

// Login Player
if($requestMethod == "POST"){

    $inputData = json_decode(file_get_contents("php://input"), true);

    if (empty($inputData)) {

        $loginPlayer = loginPlayer($_POST);
    }
    else {

        $loginPlayer = loginPlayer($inputData);
    }

    echo $loginPlayer;

}
else {

    $data = [
        'status' => 405,
        'message' => $requestMethod. ' Method Not Allowed',
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
}

?>