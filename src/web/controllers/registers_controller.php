<?php
require_once __DIR__ . '/../business/image_processing.php';
require_once __DIR__ . '/../models/user_model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $pass = $_POST['password'];
    $confirm = $_POST['password_confirm'];
    
    if ($pass !== $confirm) {
        $error = "Hasła się nie zgadzają!";
    } else {
        $pfp_path = handle_img_upload($_FILES['profile_photo'], 'pfp', null, null, $login);

        if (strpos($pfp_path, 'ProfilesFoto') !== false) {
            if (register_user($_POST['email'], $login, $pass, $pfp_path)) {
                header('Location: index.php?action=login');
                exit;
            } else { $error = "Login zajęty."; }
        } else { $error = $pfp_path; }
    }
}
include_once __DIR__ . '/../views/register_view.php';