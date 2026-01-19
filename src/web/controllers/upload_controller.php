<?php
require_once __DIR__ . '/../business/image_processing.php';

$title = $_POST['title'] ?? '';
$author = $_POST['author'] ?? '';
$file = $_FILES['image'] ?? null;

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if ($file && $file['error'] === UPLOAD_ERR_OK) {
        $types = ['image/jpeg', 'image/png']; 

        if ($file['size'] > 1048576) {
            $errors[] = "Plik jest za duży, maksymalny rozmiar wynosi 1MB.";
        }

        if (!in_array($file['type'], $types)) {
            $errors[] = "Ten plik nie jest dozwolony (tylko JPEG i PNG).";
        }

        if (empty($errors)) { 
            
            $result = handle_img_upload($file, 'gallery', $title, $author);

            if ($result === true) {
                header('Location: index.php?action=gallery');
                exit;
            } else {
                $errors[] = $result; 
            }
        }
    } elseif ($file && $file['error'] !== UPLOAD_ERR_NO_FILE) {
        $errors[] = "Wystąpił błąd przesyłania pliku (kod błędu: " . $file['error'] . ")";
    } else {
        $errors[] = "Proszę wybrać plik do przesłania.";
    }
}

include_once __DIR__ . '/../views/upload_view.php';
?>