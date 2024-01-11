<?php

require_once("../../config/DatabaseConfig.php");

$data = json_decode(file_get_contents('php://input'), true);

$db = new DatabaseConfig();
$con = $db->global_connection;

$username = $data['username'];
$password = md5($data['password']);

$login_q = "SELECT `id`,`first_name`,`last_name`,`username` from `user` where `username`='".$username."' and `password`='".$password."'";

if($con->query($login_q)->num_rows > 0){
    $token = bin2hex(random_bytes(30 / 2));
    $user = $con->query($login_q)->fetch_assoc();
    $con->query("INSERT INTO `authtoken`(`user_id`, `token`) VALUES ('".$user['id']."','".$token."')");
    die(json_encode(["success"=>true,"message"=>"Sign In Successfully","data"=>["token"=>$token,"user"=>$user]]));
}else{
    die(json_encode(["success"=>false,"message"=>"Authentication Failed"]));
}



?>
