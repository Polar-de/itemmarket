<?php

function GetDB() {
    $conn = null;

    if ($conn instanceof mysqli) {
        return $conn;
    } else {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PW, DB_DB);
        if ($conn->connect_error) {
            die("Connection failed! " . $conn->connect_error);
        } else {
            return $conn;
        }
    }
}
?>