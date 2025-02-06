<?php
session_start();

// Database connection
$db = new mysqli('localhost', 'root', '', 'mprlendingdb');

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$user_id = $_SESSION['user_id'];

// Handle Profile Picture Update
if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["profile_picture"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = mime_content_type($_FILES['profile_picture']['tmp_name']);
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFilePath)) {
            $sql = "UPDATE users SET profile_picture = ? WHERE id = ?";
            $stmt = $db->prepare($sql);
            $stmt->bind_param("si", $targetFilePath, $user_id);
            $stmt->execute();
            $stmt->close();
            $_SESSION['message'] = "Profile picture updated successfully!";
        } else {
            $_SESSION['message'] = "Error uploading image.";
        }
    } else {
        $_SESSION['message'] = "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.";
    }
}

// Handle Profile Details Update
if (isset($_POST['fullname']) && isset($_POST['email'])) {
    $fullname = htmlspecialchars(trim($_POST['fullname']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if password is entered and matches the confirmation
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
        // If no password entered, just update name and email
        $sql = "UPDATE users SET fullname = ?, email = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssi", $fullname, $email, $user_id);
    }

    // Execute query
    if ($stmt->execute()) {
        $_SESSION['message'] = "Profile updated successfully!";
    } else {
        $_SESSION['message'] = "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
}

$db->close();

// Redirect back to profile page with message
header("Location: profile.php?message=" . urlencode($_SESSION['message']));
exit;
?>
