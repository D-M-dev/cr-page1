<?php
session_start();
header('Content-Type: application/json');

$data_file = 'tournament_data.json';

// Initialize with empty data if file doesn't exist
if (!file_exists($data_file)) {
    file_put_contents($data_file, json_encode([
        'players' => [],
        'matches' => []
    ]));
}

$data = json_decode(file_get_contents($data_file), true);

// For non-admin users, hide certain information if needed
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    // You can filter data here if needed for non-admin users
}

echo json_encode($data);
?>
