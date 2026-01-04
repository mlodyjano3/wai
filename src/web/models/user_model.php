<?php
require_once __DIR__ . '/../business/db.php';

function register_user($email, $login, $password, $pfp_path) {
    $db = get_database();
    
    // sprawdzanie czy login juz istnieje
    if ($db->users->findOne(['login' => $login])) {
        return false;
    }

    $db->users->insertOne([
        'email' => $email,
        'login' => $login,
        // haszowanie haslaa przez zapisem
        'password' => password_hash($password, PASSWORD_BCRYPT),
        'profile_image' => $pfp_path
    ]);
    return true;
}

function get_user_by_login($login) {
    $db = get_database();
    return $db->users->findOne(['login' => $login]);
}