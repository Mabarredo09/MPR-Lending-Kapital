<?php
session_start();
$db = new mysqli('localhost', 'root', '', 'mprlendingdb');

// Check connection
if ($db->connect_error) {
    die(json_encode(["success" => false, "message" => "Database connection failed: " . $db->connect_error]));
}

if (!isset($_GET['name']) || empty(trim($_GET['name']))) {
    echo json_encode(["success" => false, "message" => "Missing search input"]);
    exit;
}

$searchName = "%" . trim($db->real_escape_string($_GET['name'])) . "%";

// Fetch all matching borrowers
$sql = "SELECT id, first_name, middle_name, surname FROM borrowers WHERE first_name LIKE ? OR surname LIKE ? LIMIT 10";
$stmt = $db->prepare($sql);

if (!$stmt) {
    echo json_encode(["success" => false, "message" => "Database query error: " . $db->error]);
    exit;
}

$stmt->bind_param("ss", $searchName, $searchName);
$stmt->execute();
$result = $stmt->get_result();

$borrowers = [];
while ($row = $result->fetch_assoc()) {
    $borrowers[] = $row;
}

echo json_encode(["success" => true, "borrowers" => $borrowers]);

$stmt->close();
$db->close();
?>
