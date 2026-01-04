<?php

require_once 'db.php';

function handle_img_upload($title, $author, $file){
    $upload_dir = 'images/';
    $file_extension = ($file['type'] === 'image/jpeg') ? '.jpg' : '.png';
    $basename = uniqid();
    
    $target_original = $upload_dir . $basename . $file_extension;
    $target_thumbnail = $upload_dir . $basename . '_thumb' . $file_extension;

    if (move_uploaded_file($file['tmp_name'], $target_original)) {
        
        create_thumbnail($target_original, $target_thumbnail, $file['type']);
        
        save_to_mongo($title, $author, $target_original, $target_thumbnail);
        
        return true;
    }
    return false;
}