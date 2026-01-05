<?php
require_once __DIR__ . '/../models/user_model.php';

if (isset($_SESSION['user_id'])) {
    header('Location: index.php?action=gallery');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $user = get_user_by_login($login);

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id();
        $_SESSION['user_id'] = (string)$user['_id'];
        $_SESSION['user_login'] = $user['login'];
        $_SESSION['user_pfp'] = $user['profile_image'];

        header('Location: index.php?action=gallery');
        exit;
    } else {
        $error = "Błędny login lub hasło";
    }
}

include __DIR__ . '/../views/login_view.php';