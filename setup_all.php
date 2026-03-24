<?php

require_once __DIR__ . '/includes/db.php';

try {

    // 🔐 إنشاء Admin
    $admin_user = 'asmeralselwi103@gmail.com';
    $admin_pass = password_hash('Mohammed Saeed 123', PASSWORD_DEFAULT);

    db()->prepare("INSERT INTO admins (username, password)")
        ->execute([$admin_user, $admin_pass]);

    echo "✅ Admin created<br>";

} catch (PDOException $e) {
    echo "⚠️ Admin: " . $e->getMessage() . "<br>";
}

try {

    // 👤 إنشاء API User
    $username = 'user1';
    $api_key = 'sk_' . bin2hex(random_bytes(32));

    db()->prepare("INSERT INTO users (username, api_key)")
        ->execute([$username, $api_key]);

    echo "✅ API User created<br>";
    echo "🔑 API KEY: $api_key<br>";

} catch (PDOException $e) {
    echo "⚠️ User: " . $e->getMessage();
}