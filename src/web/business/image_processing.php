<?php
require_once __DIR__ . '/db.php';

function handle_img_upload($file, $upload_target, $title = null, $author = null, $username = '') {
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return "Wystąpił błąd przesyłania pliku (kod: " . $file['error'] . ").";
    }

    if ($file['size'] > 1048576) {
        return "Plik jest za duży. Maksymalny rozmiar to 1MB.";
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime_type = $finfo->file($file['tmp_name']);

    $allowed_mime_types = [
        'image/jpeg' => 'jpg',
        'image/png'  => 'png'
    ];

    if (!array_key_exists($mime_type, $allowed_mime_types)) {
        return "Niedozwolony format pliku (wykryto: $mime_type). Dozwolone są tylko JPG i PNG.";
    }

    $extension = $allowed_mime_types[$mime_type];

    if ($upload_target == "gallery") {
        return handle_gallery_upload($file, $extension, $title, $author, $mime_type);
    } 
    else if ($upload_target == "pfp") { 
        return handle_pfp_upload($file, $extension, $mime_type, $username);
    }
    
    return "Nieznany cel uploadu.";
}

function handle_gallery_upload($file, $extension, $title, $author, $mime_type) {
    $upload_dir = __DIR__ . '/../images/';
    
    $unique_name = uniqid();
    $file_name = $unique_name . '.' . $extension;
    $thumb_name = $unique_name . '_thumb.' . $extension;

    $target_file = $upload_dir . $file_name;
    $target_thumb = $upload_dir . $thumb_name;

    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        if (resize_image($target_file, $target_thumb, $mime_type, 200, 125)) {
            save_to_mongo($title, $author, "images/$file_name", "images/$thumb_name");
            return true;
        } else {
            return "Błąd podczas tworzenia miniatury galerii.";
        }
    } else {
        return "Nie udało się zapisać pliku w katalogu images.";
    }
}

function handle_pfp_upload($file, $extension, $mime_type, $username) {
    $upload_dir = __DIR__ . '/../ProfilesFoto/';
    
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $safe_username = preg_replace('/[^a-zA-Z0-9_-]/', '', $username);
    if (empty($safe_username)) {
        $safe_username = 'user';
    }

    $file_name = $safe_username . '_' . uniqid() . '.' . $extension;
    $target_file = $upload_dir . $file_name;

    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        if (resize_image($target_file, $target_file, $mime_type, 125, 125)) {
            return "ProfilesFoto/" . $file_name;
        } else {
            return "Błąd skalowania zdjęcia profilowego.";
        }
    } else {
        return "Błąd zapisu pliku profilowego (sprawdź uprawnienia folderu ProfilesFoto).";
    }
}

function resize_image($src_path, $dest_path, $type, $new_width, $new_height) {
    $src_img = null;
    switch ($type) {
        case 'image/jpeg': $src_img = imagecreatefromjpeg($src_path); break;
        case 'image/png':  $src_img = imagecreatefrompng($src_path); break;
    }

    if (!$src_img) return false;

    $width = imagesx($src_img);
    $height = imagesy($src_img);

    $tmp_img = imagecreatetruecolor($new_width, $new_height);

    if ($type === 'image/png') {
        imagealphablending($tmp_img, false);
        imagesavealpha($tmp_img, true);
    }

    imagecopyresampled($tmp_img, $src_img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    if ($type === 'image/jpeg') {
        imagejpeg($tmp_img, $dest_path);
    } else {
        imagepng($tmp_img, $dest_path);
    }

    imagedestroy($src_img);
    imagedestroy($tmp_img);

    return true;
}

function save_to_mongo($title, $author, $original_path, $thumb_path) {
    $db = get_database();
    $db->images->insertOne([
        'title' => $title,
        'author' => $author,
        'original' => $original_path,
        'thumbnail' => $thumb_path,
        'created_at' => new MongoDB\BSON\UTCDateTime()
    ]);
}
?>