<?php

require_once __DIR__ . '/includes/db.php';

try {
    db()->exec("ALTER TABLE users MODIFY api_key VARCHAR(255)");
    echo "✅ Done";
} catch (PDOException $e) {
    echo $e->getMessage();
}