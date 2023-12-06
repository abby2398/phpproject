<?php
session_start();
require_once("config.php");

// After the user logs out
$session_id = session_id();
$delete_query = "UPDATE tblstd SET session_id = NULL WHERE session_id = '$session_id'";

$delete_result = mysqli_query($conn, $delete_query);

if ($delete_result) {
    // Destroy the session to log the user out
    session_destroy();
    // Redirect the user to the login page
    header("Location: index.php");
    exit;
} else {
    // Handle any errors if the update query fails
    header("Location: error.php?message=" . urlencode("Error while logging out"));
    exit;
}
?>
