<?php 

require 'dbcon.php';

function error422($message){

    $data = [
        'status' => 422,
        'message' => $message,
    ];
    header("HTTP/1.0 422 Unprocessable Entity");
    echo json_encode($data);
    exit();
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


?>