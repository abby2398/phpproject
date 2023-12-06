<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="/css/index.css">
</head>
<body>
<?php include_once 'navbar.html'; ?>

<!-- Upload form -->
<div class="upload-form">
    <h2>Upload Your Photo</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*">
        <input type="submit" value="Upload">
    </form>
</div>

<!-- Display all uploaded images -->
<div class="image-container">
    <?php
    // Fetch and display all uploaded images
    require_once("config.php");
    $sql = "SELECT * FROM uploaded_images";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<a href='" . $row['image_path'] . "' target='_blank'><img src='" . $row['image_path'] . "' alt='Uploaded Image'></a>";
    }
#comment
    mysqli_close($conn);
    ?>
</div>
<?php include_once 'footer.html'; ?>
</body>
</html>
