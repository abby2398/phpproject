<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="/css/contact.css"> 
</head>
<body>
    <?php include_once 'navbar.html'; ?>

    <div class="container">
        <h1>Contact Us</h1>
        
        <!-- Contact Form -->
        <form action="contact.php" method="post">
        <label for="Name">Name:</label>
        <input type="text" id="Name" name="name" required><br><br>

        <label for="Email">Email:</label>
        <input type="email" id="Email" name="email" required><br><br>

        <label for="Message">Message:</label>
        <textarea id="Message" name="message" rows="4" required></textarea><br><br>

        <button type="submit" name="submit" value="submit">Submit</button>
        </form>

        <?php
        // Include your database connection code
        require_once("config.php");

        // Check if the form has been submitted
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            // Insert the query into the database
            $sql = "INSERT INTO contact_queries (Name, Email, Message) VALUES ('$name', '$email', '$message')";
            if ($conn->query($sql) === TRUE) {
                echo '<p class="success-message">Your message has been sent successfully!</p>';
                // After successfully processing the form data and inserting into the database
                header("Location: thank_you.php"); // Redirect to a thank you page
                exit;
            } else {
                echo '<p class="error-message">Error: ' . $conn->error . '</p>';
            }
        }
        ?>

        <!-- Display Previously Submitted Contact Queries -->
        <h2>Previously Submitted Queries</h2>
        <ul>
            <?php
            // Retrieve the contact queries from the database
            $sql = "SELECT * FROM contact_queries ORDER BY created_at DESC";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo '<li>';
                echo '<strong>Name:</strong> ' . $row['Name'] . '<br>';
                echo '<strong>Email:</strong> ' . $row['Email'] . '<br>';
                echo '<strong>Message:</strong> ' . $row['Message'] . '<br>';
                echo '</li>';
            }
            ?>
        </ul>
    </div>
    <?php include_once 'footer.html'; ?>
</body>
</html>
