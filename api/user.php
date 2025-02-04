<?php
require_once('core.php');
function getKaryawan(){
    include_once('connection.php');
    $res = GetData($DB,'select * from t_karyawan');
    echo json_encode(["status"=>200,"message"=>"successfully","data"=>$res]);
}

function getJadwal(){
    include_once('connection.php');
    $res = GetData($DB,'select * from t_penjadwalan');
    echo json_encode(["status"=>200,"message"=>"successfully","data"=>$res]);
}