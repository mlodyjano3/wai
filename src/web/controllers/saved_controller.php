<?php
require_once __DIR__ . '/../models/image_model.php';

if (!isset($_SESSION['saved_images'])) {
    $_SESSION['saved_images'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['remove_selected']) && isset($_POST['selected_to_remove'])) {
        foreach ($_POST['selected_to_remove'] as $id_to_remove) {
            unset($_SESSION['saved_images'][$id_to_remove]);
        }
    }
    
    if (isset($_POST['quantities'])) {
        foreach ($_POST['quantities'] as $id => $qty) {
            if (isset($_SESSION['saved_images'][$id])) {
                $_SESSION['saved_images'][$id] = max(1, (int)$qty);
            }
        }
    }
}

$saved_ids = array_keys($_SESSION['saved_images']);
$images = [];
if (!empty($saved_ids)) {
    $images = get_images_by_ids($saved_ids);
}

include __DIR__ . '/../views/saved_view.php';