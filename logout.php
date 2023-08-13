<?php

include __DIR__ . '/includes/connection.php';

session_destroy();
//unset($_SESSION['logged_in'], $_SESSION['user']);

session_regenerate_id();

setcookie('remember_token', '', time() - 2592000, "/", "", 0, 1);

header('Location: home.php');