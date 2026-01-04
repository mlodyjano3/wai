<?php
require_once __DIR__ . '/../models/image_model.php';


$pageSize = 4; // ile zdjęć na jednej stronie
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$skip = ($page - 1) * $pageSize;

// dane
$images = get_images($skip, $pageSize);
$totalImages = get_images_count();
$totalPages = ceil($totalImages / $pageSize);

// dodanie do widoku
include_once __DIR__ . '/../views/gallery_view.php';