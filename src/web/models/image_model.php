<?php
require_once __DIR__ . '/../business/db.php';

function get_images($skip, $limit) {
    $db = get_database();
    $opts = [
        'skip' => (int)$skip,
        'limit' => (int)$limit,
        'sort' => ['_id' => -1],
    ];
    return $db->images->find([], $opts);
}

function get_images_count() {
    $db = get_database();
    return $db->images->countDocuments();
}

function insert_image($image) {
    $db = get_database();
    return $db->images->insertOne($image);
}

function get_images_by_ids($ids) {
    $db = get_database();
    $query = ['_id' => ['$in' => []]];
    
    if (!empty($ids)) {
        $object_ids = [];
        foreach ($ids as $id) {
            try {
                $object_ids[] = new MongoDB\BSON\ObjectId($id);
            } catch (Exception $e) {
            }
        }
        
        if (!empty($object_ids)) {
            $query = ['_id' => ['$in' => $object_ids]];
        }
    }
    
    return $db->images->find($query);
}
?>