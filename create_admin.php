<?php
// Ye file SIRF EK BAAR chalani hai — admin user create karne ke liye.
// Chalane ke baad is file ko delete kar dena (security ke liye).

require 'config.php';

$username = 'admin';
$plainPassword = 'admin123';

// Password ko HASH karke store karte hain — kabhi bhi plain text mein save nahi karte
$hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->execute([$username, $hashedPassword]);

echo "Admin user create ho gaya! <br>";
echo "Username: admin <br>";
echo "Password: admin123 <br>";
echo "<strong>Ab is file (create_admin.php) ko delete kar dena.</strong>";
?>
