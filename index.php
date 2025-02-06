<?php
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection
    $db = new mysqli('localhost', 'root', '', 'mprlendingdb');

    // Check connection
    if ($db->connect_error) {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Connection Failed',
                        text: '" . $db->connect_error . "',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
              </script>";
        exit();
    }

    // Check if email exists
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Login Successful',
                            text: 'Redirecting to dashboard...',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            window.location.href = 'dashboard.php';
                        });
                    });
                  </script>";
            // Redirect to dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Error',
                            text: 'Invalid email or password.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    });
                  </script>";
        }
    } else {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Error',
                        text: 'Invalid email or password.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
              </script>";
    }

    $stmt->close();
    $db->close();
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
    <link
        href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap"
        rel="stylesheet">

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
            <form action="" method="post" class="login-form">
                <label for="email" class="strong">Email</label>
                <br>
                <input type="email" name="email" id="email" placeholder="Please enter your email" required><br><br>
                <label for="password" class="strong">Password</label>
                <br>
                <input type="password" name="password" id="password" placeholder="Please enter your password" required>
                <a href="#" class="forgot-password">Forgot Password?</a>
                <button type="submit" name="login" class="login-button">Log-in</button>

                <div class="signup-container">
                    <p>Don't have an account? <a href="signup.php">Signup!</a></p>
                </div>
        </div>
        </form>
    </div>
</body>

</html>