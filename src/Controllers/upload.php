<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("../../config/DatabaseConfig.php");

$headers = getallheaders();

if (!array_key_exists('Authorization', $headers)) {
    http_response_code(401);
    die(json_encode(["status" => false, "message" => "UnAuthorized Access"]));
} else {
    $db = new DatabaseConfig();
    $con = $db->global_connection;
    $token = $headers['Authorization'];
    $user_id = $headers['User_id'];

    if ($con->query("SELECT * from authtoken where `token`='$token' and `user_id`='$user_id'")->num_rows == 0) {
        http_response_code(401);
        die(json_encode(["status" => false, "message" => "UnAuthorized Access"]));
    } else {
        if (isset($_FILES['fileInput'])) {
            $folder_path = '../../file/';
            $filename = basename($_FILES['fileInput']['name']);
            $newname = $folder_path . $filename;
            $user_id = '1';

            $FileType = pathinfo($newname, PATHINFO_EXTENSION);
            $allowedExtensions = ['pdf'];

            if (in_array(strtolower($FileType), $allowedExtensions)) {
                if (move_uploaded_file($_FILES['fileInput']['tmp_name'], $newname)) {

                    $query = "INSERT INTO file (user_id, file) VALUES ('$user_id', '$filename')";
                    $result = $con->query($query);

                    if ($result) {
                        echo json_encode(["status" => true, "message" => "File Uploaded"]);
                    } else {
                        echo json_encode(["status" => false, "message" => "Something went wrong with the database."]);
                    }
                } else {
                    echo json_encode(["status" => false, "message" => "Upload Failed"]);
                }
            } else {
                echo json_encode(["status" => false, "message" => "Class notes must be uploaded in PDF format"]);
            }
        } else {
            echo json_encode(["status" => false, "message" => "No file was received"]);
        }
    }
}
?>
