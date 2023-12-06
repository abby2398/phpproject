<?php
session_start();
require_once("config.php");

// Check if the user is authenticated
if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true) {
    header("Location: login.php");
    exit;
}

// Get the username from the session
$username = $_SESSION["username"];
$username = ucfirst($username) . " !";

// Check if the user has uploaded a profile picture
if (isset($_FILES["profileImage"]) && $_FILES["profileImage"]["error"] == UPLOAD_ERR_OK) {
    $username = $_SESSION["username"];
    $uploadDir = "images/uploads/";
    $uniqueFilename = uniqid() . "_" . $_FILES["profileImage"]["name"];
    $uploadPath = $uploadDir . $uniqueFilename;

    if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $uploadPath)) {
        
        $updateSql = "UPDATE tblstd SET ProfileImage = '$uploadPath' WHERE username = '$username'";
        mysqli_query($conn, $updateSql);
        echo "<script>alert('Your profile picture was uploaded.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authenticated Page</title>
    <link rel="stylesheet" type="text/css" href="/css/authenticated.css">
    <link rel="stylesheet" type="text/css" href="/css/navbar.css">
</head>
<body>
    <nav>
        <a href="index">Home</a>
        <a href="contact" target="_blank">Contact</a>
        <a href="about" target="_blank">About Us</a>
    </nav>
    <h1 style="color: blueviolet; text-align: center;">Welcome to phpproject.com</h1>
    <div class="welcome">
        <h1>Welcome back, <?php echo htmlspecialchars($username); ?></h1>
    </div>
    <form action="logout.php" method="post">
        <input type="submit" class="logout-button" value="Logout">
    </form>
    <?php
    // Display the user's profile picture if available
    $profileImagePath = '';
    $username = $_SESSION["username"]; 
    $profileImageQuery = "SELECT ProfileImage FROM tblstd WHERE username = '$username'";
    $result = mysqli_query($conn, $profileImageQuery);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $profileImagePath = $row['ProfileImage'];
    }

    if (!empty($profileImagePath)) {
        echo "<img src='$profileImagePath' alt='Profile Picture' class='profile-picture'>";
    }
    ?>
    <form action="authenticated.php" method="post" enctype="multipart/form-data">
        <label for="profileImage">Upload Profile Picture:</label>
        <input type="file" id="profileImage" name="profileImage" accept="image/*">
        <input type="submit" value="Upload">
    </form>
    <?php include_once 'footer.html'; ?>
    
</body>
</html>
