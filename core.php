<?php
function ResJSON($res){
    echo json_encode(["status"=>200,"message"=>"successfully","data"=>$res]);
} 
function GetData($conn,$query){
    $s = $conn->prepare($query);
    $s->execute();
    $res = $s->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}

function InsertData($conn,$query){
    $s = $conn->prepare($query);
    $s->execute();
    $affectedRows = mysqli_affected_rows($conn);
    return $affectedRows;
}

function UpdateData($conn,$query){
    $s = $conn->prepare($query);
    $s->execute();
    $affectedRows = mysqli_affected_rows($conn);
    return $affectedRows;
}

function DeleteData($conn,$query){
    $s = $conn->prepare($query);
    $s->execute();
    $affectedRows = mysqli_affected_rows($conn);
    return $affectedRows;
}

// Function to check if a string contains both SQL keywords in a combination
function containsSqlCombination($value, $combination) {
    // Check if both keywords in the combination are present in the value
    return stripos($value, $combination[0]) !== false && stripos($value, $combination[1]) !== false;
}


function checkSQLInjection($method){
    $sql_combinations = [
        ['INSERT', 'INTO'],
        ['SELECT', 'FROM'],
        ['UPDATE', 'SET'],
        ['DELETE', 'FROM']
    ];
    $d = [];
    if($method=='GET'){
        $d = $_GET;
    }else if($method=='POST'){
        $d = $_POST;
    }
    // Loop through $_GET parameters and check for dangerous combinations
    foreach ($d as $key => $value) {
        foreach ($sql_combinations as $combination) {
            // Check if both keywords from the combination are found in the value
            if (containsSqlCombination($value, $combination)) {
                // If a dangerous combination is found, handle the case
                return true;
                exit;
                // die("Invalid input detected: Possible SQL Injection detected in parameter '$key'.");
            }
        }
    }
    return false;
}
// If no dangerous input is found, proceed with normal logic
// echo "No SQL Injection detected, proceed with further logic.";
?>
