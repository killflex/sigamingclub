<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: access');
header('Access-Control-Allow-Methods: POST');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

include('function.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];

// Login Player
if($requestMethod == "POST"){

    $inputData = json_decode(file_get_contents("php://input"), true);

    if (empty($inputData)) {

        $registerPlayer = registerPlayer($_POST);
    }
    else {

        $registerPlayer = registerPlayer($inputData);
    }

    echo $registerPlayer;

}
else {

    $data = [
        'status' => 405,
        'message' => $requestMethod. ' Method Not Allowed',
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
}


// require_once 'dbcon.php';
// require_once 'sendJson.php';

// if ($_SERVER['REQUEST_METHOD'] == 'POST') :
//     $data = json_decode(file_get_contents('php://input'));
//     if (
//         !isset($data->nama_player) ||
//         !isset($data->username) ||
//         !isset($data->password) ||
//         empty(trim($data->nama_player)) ||
//         empty(trim($data->username)) ||
//         empty(trim($data->password))
//     ) :
//         sendJson(
//             422,
//             'Please fill all the required fields & None of the fields should be empty.',
//             ['required_fields' => ['nama_player', 'username', 'password']]
//         );
//     endif;

//     $nama_player = mysqli_real_escape_string($conn, htmlspecialchars(trim($data->nama_player)));
//     $username = mysqli_real_escape_string($conn, trim($data->username));
//     $password = trim($data->password);

//     $hash_password = password_hash($password, PASSWORD_DEFAULT);
//     $sql = "SELECT `username` FROM `players` WHERE `username`='$username'";
//     $query = mysqli_query($conn, $sql);
//     $row_num = mysqli_num_rows($query);

//     if ($row_num > 0) sendJson(422, 'This username already in use!');

//     $sql = "INSERT INTO `players`(`nama_player`,`username`,`password`) VALUES('$nama_player','$username','$hash_password')";
//     $query = mysqli_query($conn, $sql);
//     if ($query) sendJson(201, 'You have successfully registered.');
//     sendJson(500, 'Something going wrong.');
// endif;

// sendJson(405, 'Invalid Request Method. HTTP method should be POST');
