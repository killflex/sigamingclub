<?php 

require 'dbcon.php';
require '../../vendor/autoload.php';
require_once 'sendJson.php';

// Token Encoder JWT
use Firebase\JWT\JWT;
$tokenSecret = 'sinurulhuda';

function encodeToken($data){

    global $tokenSecret;
    $token = array(
        'iss' => 'http://localhost/php/login-api/',
        'iat' => time(),
        'exp' => time() + 3600, // 1hr
        'data' => $data,
    );
    return JWT::encode($token, $tokenSecret, 'HS256');
}

// Error Message Input
function error422($message){

    $data = [
        'status' => 422,
        'message' => $message,
    ];
    header("HTTP/1.0 422 Unprocessable Entity");
    echo json_encode($data);
    exit();
}

// Register Player
function registerPlayer($registerInput){

    global $conn;

    $nama_player = mysqli_real_escape_string($conn, htmlspecialchars($registerInput['nama_player']));
    $username = mysqli_real_escape_string($conn, $registerInput['username']);
    $password = $registerInput['password'];

    if(empty(trim($nama_player))){

        return error422('Enter the nama player');
    }
    elseif(empty(trim($username))){

        return error422('Enter the username');
    }
    elseif(empty(trim($password))){

        return error422('Enter the password');
    }
    else {

        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "SELECT `username` FROM `players` WHERE `username`='$username'";
        $query = mysqli_query($conn, $sql);
        $row_num = mysqli_num_rows($query);

        if ($row_num > 0){

            $data = [
            'status' => 422,
            'message' => 'This username already in use',
            ];
            header("HTTP/1.0 422 This username already in use");
            return json_encode($data);
        }

        $sql = "INSERT INTO `players`(`nama_player`,`username`,`password`) VALUES('$nama_player','$username','$hash_password')";
        $query = mysqli_query($conn, $sql);

        if ($query){

            $data = [
            'status' => 201,
            'message' => 'Register Successfuly',
            ];
            header("HTTP/1.0 201 Register Successfuly");
            return json_encode($data);
        }
        $data = [
        'status' => 500,
        'message' => 'Internal Server Error',
        ];
        header("HTTP/1.0 500 Internal Server Error");
        return json_encode($data);
    }
}

// Login Player
function loginPlayer($loginInput){

    global $conn;

    $username = mysqli_real_escape_string($conn, $loginInput['username']);
    $password = $loginInput['password'];

    if(empty(trim($username))){

        return error422('Enter the username');
    }
    elseif(empty(trim($password))){

        return error422('Enter the password');
    }
    else {

        $query = "SELECT * FROM `players` WHERE `username`='$username'";
        $query_run = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($query_run, MYSQLI_ASSOC);

        if ($row === null) {

            $data = [
            'status' => 404,
            'message' => 'User Not Found',
            ];
            header("HTTP/1.0 404 User Not Found");
            return json_encode($data);
        }

        if (!password_verify($password, $row['password'])){

            $data = [
            'status' => 401,
            'message' => 'Incorrect Password',
            ];
            header("HTTP/1.0 401 Incorrect Password");
            return json_encode($data);
        }else{
            
        }

        $data = [
        'status' => 200,
        'message' => 'Login Successfuly',
        'token' => encodeToken(array("id_player" => $row['id_player'],"nama_player" => $row['nama_player'],"username" => $row['username'])),
        ];
        header("HTTP/1.0 200 Login Successfuly");
        return json_encode($data);
    }
}

// Store Log Game Data
function storeLogGame($logGameInput){
    
    global $conn;

    $id_game = mysqli_real_escape_string($conn, $logGameInput['id_game']);
    $id_player = mysqli_real_escape_string($conn, $logGameInput['id_player']);
    $waktu_mulai = mysqli_real_escape_string($conn, $logGameInput['waktu_mulai']);
    $waktu_entry = mysqli_real_escape_string($conn, $logGameInput['waktu_entry']);

    if(empty(trim($id_game))){

        return error422('Enter the id game');
    }
    elseif(empty(trim($id_player))){

        return error422('Enter the id player');
    }
    elseif(empty(trim($waktu_mulai))){

        return error422('Enter Waktu Mulai');
    }
    elseif(empty(trim($waktu_entry))){

        return error422('Enter Waktu Entry');
    }
    else {

        $query = "INSERT INTO log_game (id_game, id_player, waktu_mulai, waktu_entry) VALUES ('$id_game', '$id_player', '$waktu_mulai', '$waktu_entry')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            
            $data = [
            'status' => 201,
            'message' => 'Log Game Data Created Successfully',
            ];
            header("HTTP/1.0 201 Created");
            return json_encode($data);
        }
        else {

            $data = [
            'status' => 500,
            'message' => 'Internal Server Error',
            ];
            header("HTTP/1.0 500 Internal Server Error");
            return json_encode($data);
        }
    }
}

// Store Log Game Event Data
function storeLogGameEvent($logGameEventInput){
    
    global $conn;

    $id_log = mysqli_real_escape_string($conn, $logGameEventInput['id_log']);
    $no_event = mysqli_real_escape_string($conn, $logGameEventInput['no_event']);
    $status_event = mysqli_real_escape_string($conn, $logGameEventInput['status_event']);

    if(empty(trim($id_log))){

        return error422('Enter the id log');
    }
    elseif(empty(trim($no_event))){

        return error422('Enter the no event');
    }
    elseif(empty(trim($status_event))){

        return error422('Enter status event');
    }
    else {

        $query = "INSERT INTO log_game_event (id_log, no_event, status_event) VALUES ('$id_log', '$no_event', '$status_event')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            
            $data = [
            'status' => 201,
            'message' => 'Log Game Event Data Created Successfully',
            ];
            header("HTTP/1.0 201 Created");
            return json_encode($data);
        }
        else {

            $data = [
            'status' => 500,
            'message' => 'Internal Server Error',
            ];
            header("HTTP/1.0 500 Internal Server Error");
            return json_encode($data);
        }
    }
}

// Read Game Event Data
function getEventList(){

    global $conn;
    $query = "SELECT * FROM game_event";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        
        if (mysqli_num_rows($query_run) > 0) {
            
            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

            $data = [
            'status' => 200,
            'message' => 'Game Event List Fetched Successfully',
            'data' => $res,
            ];
            header("HTTP/1.0 200 Success");
            return json_encode($data);
        }else {
            $data = [
            'status' => 404,
            'message' => 'No Game Event Found',
            ];
            header("HTTP/1.0 404 No Game Event Found");
            return json_encode($data);
        }
    }else {

        $data = [
        'status' => 500,
        'message' => 'Internal Server Error',
        ];
        header("HTTP/1.0 500 Internal Server Error");
        return json_encode($data);
    }
}