<?php
require_once __DIR__ . '/../vendor/autoload.php';

function get_database() {
    try {
        $client = new MongoDB\Client(
            'mongodb://127.0.0.1:27017/wai', 
            [
                'username' => 'wai_web',
                'password' => 'w@i_w3b',
            ]
        );
        return $client->wai;
    } catch (Exception $e) {
        die("Błąd połączenia z bazą: " . $e->getMessage());
    }
}
?>