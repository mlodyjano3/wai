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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once 'controllers/upload_controller.php';
        } else {
            include_once 'views/upload_view.php';
        }
        break;
    
    case 'login':

        break;
        
    case 'logout':
        session_destroy();
        header('Location: index.php?action=gallery');
        break;
    
    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        };
        include 'views/register_view.php';
        break;
        
    default: 
        echo "Strona nie istnieje";
        break;
}