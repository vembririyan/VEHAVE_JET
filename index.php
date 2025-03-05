<?php
require_once './core.php';
header('Content-Type: application/json');
require_once 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

function GET($route,$func){
    $requestUri = $_SERVER['REQUEST_URI'];
    $parsedUrl = parse_url($requestUri);
    if(checkSQLInjection('GET')){
        echo json_encode(["status"=>404,"message"=>"Not Found"]);
        exit;
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_ENV['BASE'].$route == $parsedUrl['path']) {
        call_user_func($func);
        exit;
    }else if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_ENV['BASE'].$route == $_SERVER['REQUEST_URI']) {
        echo json_encode(["status"=>405,"message"=>"Method Not Allowed"]);
        exit;
    }
}

function POST($route,$func){
    $requestUri = $_SERVER['REQUEST_URI'];
    $parsedUrl = parse_url($requestUri);
    if(checkSQLInjection('POST')){
        echo json_encode(["status"=>404,"message"=>"Not Found"]);
        exit;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_ENV['BASE'].$route == $parsedUrl["path"]) {
        call_user_func($func);
        exit;
    }else if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_ENV['BASE'].$route == $_SERVER['REQUEST_URI']) {
        echo json_encode(["status"=>405,"message"=>"Method Not Allowed"]);
        exit;
    }
}

require_once('./routes.php');

