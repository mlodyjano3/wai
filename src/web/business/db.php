<?php
function get_database() {
    $username = 'wai_web';
    $password = 'w@i_w3b';
    $database_nazwa = 'wai';

    try {
        $encoded_password = urlencode($password);
        
        $mongo = new MongoDB\Client(
            "mongodb://{$username}:{$encoded_password}@127.0.0.1:27017/wai"
        );
        return $mongo->selectDatabase($database_nazwa);
    } catch (Exception $e) {
        die("Błąd połączenia z bazą danych: " . $e->getMessage());
    }
}