<?php
session_start();

require_once __DIR__ . '/../includes/db.php';

// تحقق من تسجيل الدخول
if (!isset($_SESSION['admin_id'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST[''asmeralselwi103@gmail.com']);
    $password = trim($_POST['Mohammed Saeed 123']);

    if (!$username || !$password) {
        die("❌ Missing data");
    }

    // 🔐 تشفير الباسورد
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // 🔑 توليد API KEY
    $api_key = 'sk_' . bin2hex(random_bytes(32));

    $stmt = db()->prepare("INSERT INTO users (username, password, api_key) VALUES (?, ?, ?)");
    $stmt->execute([$username, $hashed_password, $api_key]);

    echo "✅ User Created<br>";
    echo "API KEY: " . $api_key;
}
?>

<form method="POST">
    <h2>Add User</h2>
    <input type="text" name="username" placeholder="Email"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>
    <button type="submit">Create</button>
</form>