<?php

function insert_user(array $data) {
    global $db;

    $query = 'INSERT INTO users (name, email, password, gender, created_at)
            VALUES (?, ?, ?, ?, ?)';
    
    $stmt = mysqli_prepare($db, $query);

    $time = date('Y-m-d H:i:s');
    $passwor_hash = password_hash($data['password'], PASSWORD_BCRYPT);
    mysqli_stmt_bind_param($stmt, 'sssss', 
        $data['name'], $data['email'], $passwor_hash, $data['gender'], $time
    );

    mysqli_stmt_execute($stmt);
}

function email_exists(string $email): bool {
    global $db;

    $query = 'SELECT * FROM users WHERE email = ?';
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    
    if ($row) {
        return true;
    }
    return false;
}

function login($email, $password, $remember = false): bool {
    global $db;

    $query = 'SELECT * FROM users WHERE email = ?';
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id();
        
        $_SESSION['logged_in'] = 1;
        unset($user['password']);
        $_SESSION['user'] = $user;

        if ($remember) {
            $token = uniqid();

            setcookie('remember_token', $token, time() + 2592000, "/", "", 0, 1);
            
            $query = 'UPDATE users SET remember_token = ? WHERE id = ?';
            $stmt = mysqli_prepare($db, $query);
            mysqli_stmt_bind_param($stmt, 'si', $token, $user['id']);
            mysqli_stmt_execute($stmt);
        }
        return true;
    }
    return false;
}

function login_check(): bool {
    global $db;

    $token = $_COOKIE['remember_token'] ?? '';
    if ($token) {
        $query = 'SELECT * FROM users WHERE remember_token = ?';
        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, 's', $token);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);
        if ($user) {
            session_regenerate_id();
            $_SESSION['logged_in'] = 1;
            unset($user['password']);
            $_SESSION['user'] = $user;
        }
    }

    if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
        return false;
    }
    return true;
    
}