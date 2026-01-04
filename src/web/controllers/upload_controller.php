<?php
$title = $_POST['title'] ?? '';
$author = $_POST['author'] ?? '';
$file = $_FILES['image'] ?? null;

$errorrs = [];

if ($file){
    $types = ['image/jpeg', 'image/png']; // dozwolone typy

    if ($file['size'] > 1048576) {// 1048576 bajty to 1MB
        $errorrs[] = "Plik jest za duzy, maksymalny rozmiar wynosi 1MB.";
    }

    if (!in_array($file['type'], $types)) {
        $errorrs[] = "Ten plik nie jest dozwolony (tylko JPEG i PNG).";
    }

    if (empty($errorrs)) { // brak bledow - kontynuacja
        require_once '../business/image_processing.php';
        
        if (handle_img_upload($title, $author, $file)) {
            header('Location: index.php?action=gallery');
            exit;
        } else {
            $errorrs[] = "Wystąpił błąd podczas przetwarzania obrazu.";
        }
    }
    include_once '../views/upload_view.php';

}