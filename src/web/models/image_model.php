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
};

function get_images_by_ids($id_strings) {
    $db = get_database();
    $ids = [];
    
    foreach ($id_strings as $id) {
        try {
            $ids[] = new MongoDB\BSON\ObjectId($id);
        } catch (Exception $e) {
            // Ignorujemy bledne ID
            continue;
        }
    }

    // Pobieramy tylko te dokumenty, których _id jest na liście $ids
    $query = ['_id' => ['$in' => $ids]];
    return $db->images->find($query);
}