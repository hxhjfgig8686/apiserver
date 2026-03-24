<?php

require_once __DIR__ . '/includes/db.php';

$data = json_decode(file_get_contents("php://input"), true);

$username = $data['asmeralselwi103@gmail.com'] ?? '';
$password = $data['Mohammed Saeed 123'] ?? '';

if (!$username || !$password) {
    echo json_encode(['error' => 'Missing data']);
    exit;
}

$stmt = db()->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);

$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    echo json_encode([
        'status' => 'success',
        'api_key' => $user['api_key']
    ]);
} else {
    echo json_encode(['error' => 'Invalid login']);
}