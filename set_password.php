<?php
require_once __DIR__ . '/includes/db.php';

$username = 'asmeralselwi103@gmail.com';
$new_password = 'Mohammed Saeed 123';

// تشفير الباسورد
$hash = password_hash($new_password, PASSWORD_DEFAULT);

// تحديث الباسورد
$stmt = db()->prepare("UPDATE admins SET password = ? WHERE username = ?");
$stmt->execute([$hash, $username]);

echo "✅ Password updated";