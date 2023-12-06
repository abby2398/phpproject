<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
</head>

<body>
<?php include_once 'navbar.html'; ?>
<div class="container">
    <h1>Register here.</h1>
    <form class="form" action="registration.php" method="post">
        <label>Username</label><br>
        <input name="username" type="text" placeholder="Enter your username" required><br><br>
        <label>Age</label><br>
        <input name="age" type="number" placeholder="Enter your Age" required><br><br>
        <label>Class</label><br>
        <input name="class" type="text" placeholder="Enter your Class" required><br><br>
        <label>Password</label><br>
        <input name="password" type="password" placeholder="Enter your Password" required><br><br>
        <label>Confirm Password</label><br>
        <input name="confirm_password" type="password" placeholder="Confirm your Password" required><br><br>
        <button type="submit" value="submit">Register</button><br><br>
    </form>
</div>
</body>
<?php include_once 'footer.html'; ?>

</html>

<?php
require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (
        isset($_POST['username']) && isset($_POST['age']) && isset($_POST['class']) &&
        isset($_POST['password']) && isset($_POST['confirm_password'])
    ) {
        $username = $_POST['username'];
        $age = $_POST['age'];
        $class = $_POST['class'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        if (!empty($username) && !empty($age) && !empty($class) && !empty($password) && !empty($confirmPassword)) {
            // Check if the username already exists in the database
            $checkSql = "SELECT * FROM tblstd WHERE username = '$username'";
            $checkResult = mysqli_query($conn, $checkSql);

            if (mysqli_num_rows($checkResult) > 0) {
                echo "<script>alert('Username already exists. Please choose a different username.');</script>";
            } else {
                if ($password === $confirmPassword) {
                    $sql = "INSERT INTO tblstd (username, Age, Class, Password) VALUES ('$username', $age, '$class', '$password')";
                    if (mysqli_query($conn, $sql)) {
                        echo "<script>alert('Record Added Successfully');</script>";
                        header("Location: login.php");
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                } else {
                    echo "<script>alert('Passwords do not match. Please try again.');</script>";
                }
            }
        } else {
            echo "<script>alert('Please fill in all the required fields.');</script>";
        }
    }
}

mysqli_close($conn);
?>
