<?php
@session_start();
require_once 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

function DBMySQL($host,$username,$password,$dbname){
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully to the database!";
    } catch(PDOException $e) {
        // echo "Connection failed: " . $e->getMessage();
        return null;
    }
    return $conn;
}

$DB = DBMySQL('localhost','root','','penjadwalan_tioc');