<?php
require_once __DIR__ . '/../business/db.php';

function get_user_by_login($login) {
    $db = get_database();
    return $db->users->findOne(['login' => $login]);
}

function insert_user($user) {
    $db = get_database();
    return $db->users->insertOne($user);
}
?>