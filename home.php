<?php
include __DIR__ . '/includes/connection.php';
include __DIR__ . '/includes/functions.php';

if (!login_check()) {
    header('Location: login.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Welcome, <?= $_SESSION['user']['name'] ?>
        | <a href="logout.php">Logout</a>
    </h1>

    <?= 'Cookie=' . $_COOKIE['remember_token']; ?>

    <script>
        console.log(document.cookie);

    </script>
</body>
</html>