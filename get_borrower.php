<?php
session_start();
$db = new mysqli('localhost', 'root', '', 'mprlendingdb');


if ($db->connect_error) {
    die(json_encode(["success" => false, "message" => "Database connection failed"]));
}

if (!isset($_GET['id']) || empty(trim($_GET['id']))) {
    echo json_encode(["success" => false, "message" => "Missing borrower ID"]);
    exit;
}

$borrowerId = trim($db->real_escape_string($_GET['id']));

$sql = "SELECT * FROM borrowers WHERE id = ?";
$stmt = $db->prepare($sql);

if (!$stmt) {
    echo json_encode(["success" => false, "message" => "Database query error: " . $db->error]);
    exit;
}

$stmt->bind_param("i", $borrowerId);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo json_encode(["success" => true] + $row);
} else {
    echo json_encode(["success" => false, "message" => "Borrower not found"]);
}
if ($row['collateral_files']) {
    $collateralFiles = explode(',', $row['collateral_files']); // 🔹 Ensure array format
    $row['collateral_files'] = array_map('trim', $collateralFiles); // Trim spaces
}


$stmt->close();
$db->close();
?>
