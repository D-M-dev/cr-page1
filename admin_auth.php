<?php
session_start();

// Simple admin authentication (in a real app, use proper password hashing)
$valid_username = 'admin';
$valid_password_hash = password_hash('admin123', PASSWORD_DEFAULT); // In real app, store this securely

$data = json_decode(file_get_contents('php://input'), true);
$username = $data['username'] ?? '';
$password = $data['password'] ?? '';

$response = ['success' => false];

if ($username === $valid_username && password_verify($password, $valid_password_hash)) {
    $_SESSION['is_admin'] = true;
    $response['success'] = true;
}

header('Content-Type: application/json');
echo json_encode($response);
?>
