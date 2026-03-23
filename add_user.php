<?php

require_once __DIR__ . '/includes/db.php';

$username = 'asmeralselwi103@gmail.com';

// توليد API KEY تلقائي
$api_key = 'sk_' . bin2hex(random_bytes(32));

$stmt = db()->prepare("INSERT INTO users (username, api_key) VALUES (?, ?)");
$stmt->execute([$username, $api_key]);

echo "✅ User created<br>";
echo "API KEY: " . $api_key;