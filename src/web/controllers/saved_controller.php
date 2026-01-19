<?php
require_once __DIR__ . '/../models/image_model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['remove_selected']) && isset($_POST['selected_images'])) {
        foreach ($_POST['selected_images'] as $id) {
            if (isset($_SESSION['saved_images'])) {
                $key = array_search($id, $_SESSION['saved_images']);
                if ($key !== false) {
                    unset($_SESSION['saved_images'][$key]);
                }
            }
        }
        if (isset($_SESSION['saved_images'])) {
            $_SESSION['saved_images'] = array_values($_SESSION['saved_images']);
        }
    }
}

$saved_images = [];
if (isset($_SESSION['saved_images']) && !empty($_SESSION['saved_images'])) {
    // Używamy funkcji pobierającej wiele zdjęć na raz (zgodnie z modelem)
    $cursor = get_images_by_ids($_SESSION['saved_images']);
    foreach ($cursor as $image) {
        $saved_images[] = $image;
    }
}

include_once __DIR__ . '/../views/saved_view.php';
?>