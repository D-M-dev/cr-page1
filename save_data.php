<?php
session_start();
header('Content-Type: application/json');

// Only allow saving if admin is logged in
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);
$data_file = 'tournament_data.json';

if (file_put_contents($data_file, json_encode($data, JSON_PRETTY_PRINT))) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to save data']);
}
?>
