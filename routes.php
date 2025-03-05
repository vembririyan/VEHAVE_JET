<?php
include_once('./api/coreapi.php');
GET('/get-user',"getUser");

echo json_encode(["status"=>404,"message"=>"Not Found"]);
exit;
