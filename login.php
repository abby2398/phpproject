<html>
<head>
    <title>Sign in</title>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
</head>

<body>
<?php include_once 'navbar.html'; ?>
<div class="container">
        <h1>Sign in here</h1>
        <form class="form" action="login.php" method="post" AUTOCOMPLETE="off" >
            <label>username</label><br>
            <input type="hidden" name="username"><br><br>
            <label>Password</label><br>
            <input type="hidden" name="password"><br><br>
            <button type="submit" name="submitbtn" value="login">Sign in</button>
            <p>Don't have an account? <a href="registration.php"
            class="link-danger">Register</a></p>
        </form>    
    </div>
    <?php include_once 'footer.html'; ?>
</body>
</html>

<?php 
session_start();
require_once("config.php");

if(isset($_POST['username']) && isset($_POST['password'])){

    $nm = $_POST['username'];
    $pwd = $_POST['password'];

    // Construct a dynamic SQL query for authentication
    $sql = "SELECT username, Password FROM tblstd WHERE username = '$nm' AND Password = '$pwd'";
    
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        // Database query error
        header("Location: error.php?message=" . urlencode("Database query error: " . mysqli_error($conn)));
        exit;
    }

    $check = mysqli_fetch_array($result);

    if ($check) {
        // After successful login, set session ID
        $session_id = session_id();
        $update_query = "UPDATE tblstd SET session_id = '$session_id' WHERE username = '$nm'";
        $update_result = mysqli_query($conn, $update_query);
        
        if ($update_result) {
            // Set a session variable to indicate authentication
            $_SESSION["authenticated"] = true;
            $_SESSION["username"] = $nm;
            header("Location: authenticated.php");
            exit;
        } else {
            // Authentication failed
            //echo "Invalid credentials. Please try again.";
            exit;
        }
    } else {
        // Authentication failed
        echo "<script>alert('Invalid credentials, Try again.');</script>";
        exit;
    }
}

mysqli_close($conn);
?>
