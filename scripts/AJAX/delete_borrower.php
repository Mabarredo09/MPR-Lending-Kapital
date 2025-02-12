<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = array();

    // Check if ID is provided
    if (!isset($_POST['id'])) {
        $response['status'] = 'error';
        $response['message'] = 'No ID provided';
        echo json_encode($response);
        exit();
    }

    $userId = $_POST['id'];

    // Database connection
    $db = new mysqli('localhost', 'root', '', 'mprlendingdb');

    if ($db->connect_error) {
        $response['status'] = 'error';
        $response['message'] = 'Connection Failed: ' . $db->connect_error;
        echo json_encode($response);
        exit();
    }

    try {
        // Start transaction
        $db->begin_transaction();

        // Get file paths before deletion
        $sql = "SELECT id_photo, insurance_file, collateral_files FROM borrowers WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $files = $result->fetch_assoc();

        // Delete the user
        $sql = "DELETE FROM borrowers WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $userId);

        if ($stmt->execute()) {
            // Delete associated files
            if ($files) {
                if ($files['id_photo']) {
                    unlink("../../images/uploads/" . $files['id_photo']);
                }
                if ($files['insurance_file']) {
                    unlink("../../images/uploads/" . $files['insurance_file']);
                }
                if ($files['collateral_files']) {
                    $collateralFiles = explode(',', $files['collateral_files']);
                    foreach ($collateralFiles as $file) {
                        if (file_exists("../../" . trim($file))) {
                            unlink("../../" . trim($file));
                        }
                    }
                }
            }

            $db->commit();
            $response['status'] = 'success';
            $response['message'] = 'User deleted successfully';
        } else {
            throw new Exception("Failed to delete user");
        }

    } catch (Exception $e) {
        $db->rollback();
        $response['status'] = 'error';
        $response['message'] = $e->getMessage();
    }

    $stmt->close();
    $db->close();

    echo json_encode($response);
    exit();
}
?>