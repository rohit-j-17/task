<?php

require_once("../../config/DatabaseConfig.php");

$data = json_decode(file_get_contents('php://input'), true);

$db = new DatabaseConfig();
$con = $db->global_connection;

$username = $data['username'];
$password = md5($data['password']);
$first_name = $data['first_name'];
$last_name = $data['last_name'];

if($con->query("SELECT `id` from `user` where `username` = '".$username."'")->num_rows > 0){
    die(json_encode(["success"=>false,"message"=>"Username Already Exist"]));
}
else{
    try{
        $q = "INSERT INTO `user` (`first_name`, `last_name`, `username`, `password`) VALUES ('".$first_name."', '".$last_name."', '".$username."', '".$password."')";

        if($con->query($q)){
            die(json_encode(["success"=>true,"message"=>"Sign Up Successfully"]));
        }else{
            die(json_encode(["success"=>false,"message"=>"Sign Up failed"]));
        }
    }
    catch(Exception $e){
        die(json_encode(["success"=>false,"message"=>"Something went wrong. Please try again after sometime."]));
    }
   
}
?>