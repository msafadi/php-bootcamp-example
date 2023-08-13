<?php
include __DIR__ . '/includes/connection.php';
include __DIR__ . '/includes/functions.php';

$error = '';
if ($_POST) {
    
    if (login($_POST['email'], $_POST['password'], $_POST['remember'] ?? false)) {
        header('Location: home.php');
        exit;
    }
    $error = 'Invalid email and password combination';
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h1 class="mb-5">Login</h1>
        
        <?php if ($error) : ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
        <?php endif ?>

        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" value="<?= $_POST['email'] ?? '' ?>" placeholder="name@example.com">
                <label for="email">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="remember" value="1" id="remember">
                <label class="form-check-label" for="remember">
                    Remember me.
                </label>
            </div>
            <button type="submit"  class="btn btn-primary">Login</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>