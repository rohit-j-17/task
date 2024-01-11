<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("../../config/DatabaseConfig.php");

if (isset($_FILES['fileInput'])) {
    $folder_path = '../../file/';
    $filename = basename($_FILES['fileInput']['name']);
    $newname = $folder_path . $filename;
    $user_id = '1';

    $FileType = pathinfo($newname, PATHINFO_EXTENSION);
    $allowedExtensions = ['pdf'];

    if (in_array(strtolower($FileType), $allowedExtensions)) {
        if (move_uploaded_file($_FILES['fileInput']['tmp_name'], $newname)) {
            $db = new DatabaseConfig();
            $con = $db->global_connection;

            $query = "INSERT INTO file (user_id, file) VALUES ('$user_id', '$filename')";
            die($query);
            $result = $con->query($query);

            if ($result) {
                echo 'File Uploaded';
            } else {
                echo 'Something went wrong with the database.';
            }
        } else {
            echo "<p>Upload Failed.</p>";
        }
    } else {
        echo "<p>Class notes must be uploaded in PDF format.</p>";
    }
} else {
    echo "<p>No file was received.</p>";
}
?>
