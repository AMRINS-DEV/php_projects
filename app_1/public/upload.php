<?php
include "../database/database.php";


function generateRandomFilename($length)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["uploadFileInput"]))
{
    $uploadDirectory = '../uploads/';

    $row_id
        = isset($_POST["row_id"]) ? $_POST["row_id"] : '';
    $pathname
        = isset($_POST["pathname"]) ? $_POST["pathname"] : '';

    $originalFilename = $_FILES["uploadFileInput"]["name"];

    $fileExtension
        = pathinfo($originalFilename, PATHINFO_EXTENSION);

    $randomFilename
        = generateRandomFilename(16) . '_' . $row_id . '.' . $fileExtension;

    $tempFilename
        = $_FILES["uploadFileInput"]["tmp_name"];

    $destination = $uploadDirectory . $randomFilename;
    move_uploaded_file($tempFilename, $destination);

    $query = "UPDATE `data` SET `file_name`='$randomFilename' WHERE `data_id`='$row_id'";
    $stmt = db::$conn->prepare($query);

    $stmt->execute();

    header("Location: $pathname");
}
