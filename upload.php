<?php
session_start();

require_once("config.php");

if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
    // Define the directory where you want to store uploaded images
    $uploadDir = "images/uploads/";

    // Generate a unique filename for the uploaded image
    $uniqueFilename = uniqid() . "_" . $_FILES["image"]["name"];

    // Set the path to save the uploaded image
    $uploadPath = $uploadDir . $uniqueFilename;

    // Move the uploaded image to the specified directory
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadPath)) {
        // Store the image path in the database
        $insertSql = "INSERT INTO uploaded_images (image_path) VALUES ('$uploadPath')";
        mysqli_query($conn, $insertSql);
    }
}

mysqli_close($conn);

// Redirect back to the home page
header("Location: index.php");
exit;
?>
