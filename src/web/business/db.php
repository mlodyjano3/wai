<?php
function get_database() {
    $username = 'wai_web';
    $password = 'w@i_w3b';

    $database_nazwa = 'wai';

    try {
        $mongo = new MongoDB\Client(
            "mongodb://{$username}:{$password}@127.0.0.1:27017/admin"
        );
        return $mongo->selectDatabase($database_nazwa);
    } catch (Exception $e) {
        die("Błąd połączenia z bazą danych: " . $e->getMessage());
    }
}