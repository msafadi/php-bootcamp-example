<?php

include_once __DIR__ . '/includes/functions.php';

// echo $_SERVER['REQUEST_METHOD']; 
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name'])) {
        $errors['name'] = 'Please enter your Name';
    }
    if (empty($_POST['email'])) {
        $errors['email'] = 'Please enter your email address';
    } else if (email_exists($_POST['email'])) {
        $errors['email'] = 'Email already in use.';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Please enter password';
    }
    if (empty($_POST['gender'])) {
        $errors['gender'] = 'Please enter your gender';
    }

    if (!$errors) {
        insert_user($_POST);

        header('Location: thanks.php');
        exit;
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h1 class="mb-5">Register</h1>
        <form action="register.php?name=Sara&gender=female" method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                <label for="name">Name</label>
                <div class="text-danger"><?= $errors['name'] ?? '' ?></div>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                <label for="email">Email address</label>
                <div class="text-danger"><?= $errors['email'] ?? '' ?></div>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
                <div class="text-danger"><?= $errors['password'] ?? '' ?></div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label col-form-label-sm" for="gender-male">Gender</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="male" id="gender-m" checked>
                        <label class="form-check-label" for="gender-m">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="female" id="gender-f">
                        <label class="form-check-label" for="gender-f">
                            Female
                        </label>
                    </div>
                    <div class="text-danger"><?= $errors['gender'] ?? '' ?></div>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label col-form-label-sm" for="skill-html">Skills</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="skills[]" value="html" id="skill-html">
                        <label class="form-check-label" for="skill-html">
                            HTML
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="skills[]" value="css" id="skill-css">
                        <label class="form-check-label" for="skill-css">
                            CSS
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="skills[]" value="js" id="skill-js">
                        <label class="form-check-label" for="skill-js">
                            JavaScript
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit"  class="btn btn-primary">Register</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>