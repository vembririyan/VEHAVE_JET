<?php
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