<?php
require_once __DIR__ . '/../business/db.php';

function get_images($skip, $limit) {
    $db = get_database();

    $options = [
        'skip' => $skip,
        'limit' => $limit,
        'sort' => ['created_at' => -1]
    ];
    
    return $db->images->find([], $options)->toArray();
}

function get_images_count() {
    $db = get_database();
    return $db->images->countDocuments();
}