<?php

require_once '../../vendor/autoload.php';
require_once 'sendJson.php';

use Firebase\JWT\JWT;

$tokenSecret = 'sinurulhuda';

function encodeToken($data)
{
    global $tokenSecret;
    $token = array(
        'issuer_claim' => 'http://localhost/php/login-api/',
        'issuedat_claim' => time(),
        'expired' => time() + 3600, // 1hr
        'data' => $data
    );
    return JWT::encode($token, $tokenSecret, 'HS256');
}