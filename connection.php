<?php
@session_start();
require_once 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

function DBMySQL($host,$username,$password,$dbname,$port=3306){
    $conn = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $username, $password);
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully to the database!";
    } catch(PDOException $e) {
        // echo "Connection failed: " . $e->getMessage();
        return $e->getMessage();
    }
    return $conn;
}

function DBPostgre($host,$username,$password,$dbname,$port=5432){
    $dsn = "pgsql:host=$host;dbname=$dbname;port=$port";
    $conn = new PDO($dsn, $username, $password);
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully to the database!";
    } catch(PDOException $e) {
        // echo "Connection failed: " . $e->getMessage();
        return null;
    }
    return $conn;
}

$DB= DBMySQL($_ENV['hostname'], $_ENV['username'], $_ENV['password'], $_ENV['db_name']);
