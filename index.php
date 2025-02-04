<?php
header('Content-Type: application/json');
require_once 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

function GET($route,$func){
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_ENV['BASE'].$route == $_SERVER['REQUEST_URI']) {
        call_user_func($func);
        exit;
    }else if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_ENV['BASE'].$route == $_SERVER['REQUEST_URI']) {
        echo json_encode(["status"=>405,"message"=>"Method Not Allowed"]);
        exit;
    }
}

function POST($route,$func){
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_ENV['BASE'].$route == $_SERVER['REQUEST_URI']) {
        call_user_func($func);
        exit;
    }else if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_ENV['BASE'].$route == $_SERVER['REQUEST_URI']) {
        echo json_encode(["status"=>405,"message"=>"Method Not Allowed"]);
        exit;
    }
}

require_once('routes.php');

