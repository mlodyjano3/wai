<?php
require_once __DIR__ . '/../models/image_model.php';

if (!isset($_SESSION['saved_images'])) {
    $_SESSION['saved_images'] = []; 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selected_images'])) {
    foreach ($_POST['selected_images'] as $id) {
        if (!array_key_exists($id, $_SESSION['saved_images'])) {
            $_SESSION['saved_images'][$id] = 1;
        }
    }
    header("Location: index.php?action=gallery&page=" . ($_GET['page'] ?? 1));
    exit;
}

$pageSize = 4; // ile zdjęć na jednej stronie
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$skip = ($page - 1) * $pageSize;

// dane
$images = iterator_to_array(get_images($skip, $pageSize)); 
$totalImages = get_images_count();
$totalPages = ceil($totalImages / $pageSize);

// dodanie do widoku
include_once __DIR__ . '/../views/gallery_view.php';
?>