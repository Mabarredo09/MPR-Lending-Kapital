<?php
session_start();

if (isset($_POST['signup'])) {
    $fname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confpass = $_POST['confirm_password'];

    // Database connection
    $db = new mysqli('localhost', 'root', '', 'mprlendingdb');

    // Check connection
    if ($db->connect_error) {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    swal({
                        title: 'Connection Failed',
                        text: '" . $db->connect_error . "',
                        icon: 'error',
                        button: 'OK',
                    });
                });
              </script>";   
        exit();
    }

    // Check if password and confirm password match
    if ($password !== $confpass) {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    swal({
                        title: 'Error',
                        text: 'Passwords do not match.',
                        icon: 'error',
                        button: 'OK',
                        }).then(function() {
                        window.location.href = window.location.href;
                    });
                });
              </script>";
    } 
    // Check if password is at least 6 characters long
    elseif (strlen($password) < 6) {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    swal({
                        title: 'Error',
                        text: 'Password must be at least 6 characters long.',
                        icon: 'error',
                        button: 'OK',
                        }).then(function() {
                        window.location.href = window.location.href;
                    });
                });
              </script>";
    } 
    // Check if fullname is blank
    elseif ($fname == "") {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    swal({
                        title: 'Error',
                        text: 'Fullname cannot be blank.',
                        icon: 'error',
                        button: 'OK',
                        }).then(function() {
                        window.location.href = window.location.href;
                    });
                });
              </script>";
    } 
    // Check if email is already in use
    elseif (emailExists($db, $email)) {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    swal({
                        title: 'Error',
                        text: 'Email is already in use. Please use a different email.',
                        icon: 'error',
                        button: 'OK',
                    }).then(function() {
                        window.location.href = window.location.href;
                    });
                });
              </script>";
    } 
    else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert user into the database
        $sql = "INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("sss", $fname, $email, $hashedPassword);

        if ($stmt->execute()) {
            // SweetAlert for successful sign-up
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
            echo "<script>
                  document.addEventListener('DOMContentLoaded', function() {
                    swal({
                      title: 'Sign-up successful!',
                      text: 'Redirecting to login page.',
                      icon: 'success',
                      button: 'OK',
                    }).then(function() {
                      window.location.href = 'index.php';
                    });
                  });
                  </script>";
        } else {
            echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        swal({
                            title: 'Error',
                            text: 'Unable to sign up. Please try again.',
                            icon: 'error',
                            button: 'OK',
                        });
                    });
                  </script>";
        }

        $stmt->close();
    }

    $db->close();
}

// Function to check if email already exists in the database
function emailExists($db, $email) {
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    $exists = $result->num_rows > 0;

    $stmt->close();
    return $exists;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="styles/signup.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">
    <!-- SweetAlert Library -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Sign-Up</title>
</head>
<body>

    <div class="signup-container">
        <div class="signup-logo-container">
            <img src="images/logo2.png" alt="">
        </div>
        <div class="signup-form-container">
            <h1 class="signup-header">Sign-up</h1>
            <form action="" method="post" class="signup-form">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>
                <label for="email">Email Address</label>
                <br>
                <input type="text" name="email" id="email" placeholder="Please enter your email" required>
                <br>
                <label for="password" class="strong">Password</label>
                <br>
                <input type="password" id="password" name="password" placeholder="Create a password" required>
                <label for="confirm_password">Confirm Password</label>
                <br>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
                <br>
                <div class="signup-button-container">
                    <button type="submit" name="signup" class="signup-button">Sign Up</button>
                </div>
                <div class="login-container">
                    <p>Already have an account? <a href="index.php">Log-in</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>