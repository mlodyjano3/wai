<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'vendor/autoload.php';

// start sesji
session_start();

// domyslnie galeria, pobieramy co uzytkonik chce zobaczyc
$action = isset($_GET['action']) ? $_GET['action'] : 'gallery';

// routing - co uzytkownik chce zrobic
switch ($action) {

    case 'gallery':
        require_once 'controllers/gallery_controller.php';
        break;

    case 'upload':
        require_once 'controllers/upload_controller.php';
        break;
    
    case 'login':
        require_once 'controllers/login_controller.php';
        break;
        
    case 'logout':
        session_unset();
        session_destroy();
        header('Location: index.php?action=gallery');
        exit;
        break;
    
    case 'register':
        require_once 'controllers/registers_controller.php';
        break;

    case 'saved':
        require_once 'controllers/saved_controller.php';
        break;
        
    default: 
        echo "Strona nie istnieje";
        break;
}