<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchTerm = $_POST['search'];
    $response = array();

    // Database connection
    $db = new mysqli('localhost', 'root', '', 'mprlendingdb');

    if ($db->connect_error) {
        $response['status'] = 'error';
        $response['message'] = 'Connection Failed: ' . $db->connect_error;
        echo json_encode($response);
        exit();
    }

    // Search query
    $sql = "SELECT 
        *
    FROM borrowers 
    WHERE 
        id LIKE ? OR 
        first_name LIKE ? OR 
        middle_name LIKE ? OR
        surname LIKE ?";

    $searchTerm = "%$searchTerm%";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("ssss", $searchTerm, $searchTerm, $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    $borrowers = array();
    while ($row = $result->fetch_assoc()) {
        $borrowers[] = $row;
    }

    $response['status'] = 'success';
    $response['data'] = $borrowers;

    $stmt->close();
    $db->close();

    echo json_encode($response);
    exit();
}
?>