<?php
include_once('api/user.php');

GET('/karyawan',"getKaryawan");
POST('/jadwal',"getJadwal");

if (empty($content)) {
    echo json_encode(["status"=>404,"message"=>"Not Found"]);
    exit;
}