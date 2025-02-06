<?php
session_start();
$db = new mysqli('localhost', 'root', '', 'wewz');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['update_profile']) && isset($_FILES['profile_picture'])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["profile_picture"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = mime_content_type($_FILES['profile_picture']['tmp_name']);
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

    if (in_array($fileType, $allowedTypes)) {
        if ($_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFilePath)) {
                $sql = "UPDATE users SET profile_picture = ? WHERE id = ?";
                $stmt = $db->prepare($sql);
                $stmt->bind_param("si", $targetFilePath, $user_id);
                $stmt->execute();
                $stmt->close();
                $_SESSION['message'] = "Profile picture updated!";
            } else {
                $_SESSION['message'] = "Error uploading image.";
            }
        } else {
            $_SESSION['message'] = "Error uploading image. Error code: " . $_FILES['profile_picture']['error'];
        }
    } else {
        $_SESSION['message'] = "Invalid file type. Only JPG, JPEG, PNG, and GIF allowed.";
    }
}

if (isset($_POST['update_details'])) {
    $full_name = htmlspecialchars(trim($_POST['full_name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (!empty($password)) {
        if ($password === $confirm_password) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET full_name = ?, email = ?, password = ? WHERE id = ?";
            $stmt = $db->prepare($sql);
            $stmt->bind_param("sssi", $full_name, $email, $hashedPassword, $user_id);
        } else {
            $_SESSION['message'] = "Passwords do not match.";
        }
    } else {
        $sql = "UPDATE users SET full_name = ?, email = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssi", $full_name, $email, $user_id);
    }

    if ($stmt->execute()) {
        $_SESSION['message'] = "Profile updated successfully!";
    } else {
        $_SESSION['message'] = "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
}

$db->close();
header("Location: profile.php?message=" . urlencode($_SESSION['message']));
exit;
?>
