<?php
function getUser(){
    include_once('./connection.php');
    $res = GetData($DB,'select * from t_karyawan');
    ResJSON($res);
}