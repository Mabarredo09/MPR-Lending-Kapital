<?php
session_start();

// Database connection
$db = new mysqli('localhost', 'root', '', 'mprlendingdb');

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Ensure user is logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION['fullname'])) {
    $_SESSION['message'] = "Unauthorized access!";
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$fullname = $_SESSION['fullname']; // Fetch full name from session

// Handle Profile Update (Name, Email, Password)
if (isset($_POST['update_details'])) {
    $fullname = htmlspecialchars(trim($_POST['fullname']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Process password update if entered
    if (!empty($password)) {
        if ($password === $confirm_password) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET fullname = ?, email = ?, password = ? WHERE id = ?";
            $stmt = $db->prepare($sql);
            $stmt->bind_param("sssi", $fullname, $email, $hashedPassword, $user_id);
        } else {
            $_SESSION['message'] = "Passwords do not match.";
            header("Location: profile.php?message=" . urlencode($_SESSION['message']));
            exit;
        }
    } else {
        // Update only name and email if password is not entered
        $sql = "UPDATE users SET fullname = ?, email = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssi", $fullname, $email, $user_id);
    }

    if ($stmt->execute()) {
        $_SESSION['fullname'] = $fullname; // Update session with new name
        echo "<script>alert('Profile updated successfully!'); window.location.href = 'profile.php';</script>";
    } else {
        $_SESSION['message'] = "Error updating profile: " . $stmt->error;
    }
    $stmt->close();
}

// Handle Profile Picture Upload
if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
    // Format folder name: users/{name}/profile/
    $safeName = preg_replace("/[^a-zA-Z0-9]/", "_", strtolower($fullname));
    $targetDir = "uploads/users/{$safeName}/profile/";

    // Create directory if it doesn't exist
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Process file upload
    $fileName = basename($_FILES["profile_picture"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = mime_content_type($_FILES['profile_picture']['tmp_name']);
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFilePath)) {
            $sql = "UPDATE users SET profile_picture = ? WHERE id = ?";
            $stmt = $db->prepare($sql);
            $stmt->bind_param("si", $targetFilePath, $user_id);
            if ($stmt->execute()) {
                $_SESSION['message'] = "Profile picture updated successfully!";
            } else {
                $_SESSION['message'] = "Error updating profile picture.";
            }
            $stmt->close();
        } else {
            $_SESSION['message'] = "Error uploading image.";
        }
    } else {
        $_SESSION['message'] = "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.";
    }
}

$db->close();

// Redirect to profile page
header("Location: profile.php");
exit;
?>
