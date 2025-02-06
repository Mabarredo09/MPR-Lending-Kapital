<?php
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email and password are not empty
    if (empty($email) || empty($password)) {
        echo "<script>alert('Please fill in both email and password fields.')</script>";
    } else {
        // Database connection
        $db = new mysqli('localhost', 'root', '', 'mprlendingdb');

        // Check connection
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        // Check if the email exists and password matches
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['fullname'] = $user['fullname'];
                $_SESSION['email'] = $user['email'];

                // Redirect to dashboard or home page
                header("Location: dashboard.php");
                exit();
            } else {
                echo "<script>alert('Invalid password. Please try again.')</script>";
            }
        } else {
            echo "<script>alert('Email not found. Please sign up.')</script>";
        }

        $stmt->close();
        $db->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">

    <!-- SweetAlert2 -->
     <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <title>Log-in</title>
</head>
<body>
    <div class="login-container">
        <div class="logo-container">
            <img src="images/logo2.png" class="logo">
        </div>
        <div class="form-container"> 
            <h1>Log-in</h1>
            <form action="" method="post">
            <label for="email" class="strong">Email</label><br>
                <input type="email" name="email" id="email" placeholder="Please enter your email" required><br><br>
                                
                <label for="password" class="strong">Password</label><br>
                <input type="password" name="password" id="password" placeholder="Please enter your password" required><br><br>
                
             
                
                
                <input type="submit" name="login" value="Log-in">
                <p>Don't have an account? <a href="signup.php">Signup!</a></p>
            </div>
            </form>
      
    </div>
</body>
</html>