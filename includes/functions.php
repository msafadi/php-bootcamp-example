<?php
include __DIR__ . '/connection.php';

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