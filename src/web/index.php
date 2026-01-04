<?php
// start sesji
session_start();

// domyslnie galeria, pobieramy co uzytkonik chce zobaczyc
$action = isset($_GET['action']) ? $_GET['action'] : 'gallery';

// routing - co uzytkownik chce zrobic
switch ($action) {

    case 'gallery':
        break;

    case 'upload':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once '../controllers/upload_controller.php';
        } else {
            include_once 'views/upload_view.php';
        }
        break;

    case 'login':
        break;
        
    default: 
        echo "Strona nie istnieje";
        break;
}