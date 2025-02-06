<?php
session_start();

// Database connection
$db = new mysqli('localhost', 'root', '', 'mprlendingdb');

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Get the logged-in user's ID
$user_id = $_SESSION['user_id'];

// Handle Profile Update (for personal info and profile picture)
if (isset($_POST['update_details'])) {
    // Get the form data
    $fullname = htmlspecialchars(trim($_POST['fullname']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Process the password if it's entered
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
        // If no password is provided, don't update the password field
        $sql = "UPDATE users SET fullname = ?, email = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssi", $fullname, $email, $user_id);
    }

    // Execute the query for personal info
    if ($stmt->execute()) {
        $_SESSION['message'] = "Profile updated successfully!";
    } else {
        $_SESSION['message'] = "Error updating profile: " . $stmt->error;
    }
    $stmt->close();
}

// Handle Profile Picture Update
if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
    // Set the target directory for the user's profile pictures
    $targetDir = "uploads/" . strtolower(str_replace(" ", "_", $_SESSION['fullname'])) . "/profile/";
    // Create the user's folder if it doesn't exist
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    
    // Get file details
    $fileName = basename($_FILES["profile_picture"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = mime_content_type($_FILES['profile_picture']['tmp_name']);
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    
    // Validate file type
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

// Redirect back to profile page with message
header("Location: profile.php?message=" . urlencode($_SESSION['message']));
exit;
?>
