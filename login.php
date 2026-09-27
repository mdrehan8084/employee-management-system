<?php
require 'config.php';

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Galat username ya password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Employee Management</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body class="login-body">

    <div class="login-wrapper">
        <div class="login-card">

            <div class="login-brand">
                <div class="brand-icon"><i class="bi bi-people-fill"></i></div>
                <h2>EMS Portal</h2>
                <p>Employee Management System</p>
            </div>

            <?php if ($error): ?>
                <div class="alert-custom alert-danger-custom">
                    <i class="bi bi-exclamation-circle"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="login-form">
                <div class="input-group-custom">
                    <i class="bi bi-person"></i>
                    <input type="text" name="username" placeholder="Username" required autofocus>
                </div>
                <div class="input-group-custom">
                    <i class="bi bi-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn-login">
                    Sign In <i class="bi bi-arrow-right"></i>
                </button>
            </form>

            <div class="login-hint">
                <i class="bi bi-info-circle"></i> Default: <strong>admin</strong> / <strong>admin123</strong>
            </div>
        </div>

        <div class="login-decoration">
            <div class="deco-circle deco-1"></div>
            <div class="deco-circle deco-2"></div>
            <div class="deco-circle deco-3"></div>
        </div>
    </div>

</body>
</html>
