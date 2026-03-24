<?php

require_once __DIR__ . '/includes/db.php';

// Admin
$admin_user = 'asmeralselwi103@gmail.com';
$admin_pass = password_hash('Mohammed Saeed 123', PASSWORD_DEFAULT);

db()->prepare("INSERT INTO admins (username, password) VALUES (?, ?)")
   ->execute([$admin_user, $admin_pass]);

// API User
$username = 'user1';
$api_key = 'sk_' . bin2hex(random_bytes(32));

db()->prepare("INSERT INTO users (username, api_key) VALUES (?, ?)")
   ->execute([$username, $api_key]);

echo "✅ DONE";