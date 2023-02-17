<?php

function GetUserID() {
    $userID = null;
    if (isset($_SESSION['userID'])) {
        $userID = $_SESSION['userID'];
    }
    return $userID;
}

function GetUserName() {
    $userName = null;
    if (isset($_SESSION['userName'])) {
        $userName = $_SESSION['userName'];
    }
    return $userName;
}

function GetUserInfo() {
    $conn = GetDB();
    $stmt = $conn->prepare('SELECT username, email, credit FROM user WHERE username=?');
    $stmt->bind_param('s', $_SESSION['userName']);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function AddUserName($name) {
    $_SESSION['userName'] = $name;
} 

function AddUserID() {
    $_SESSION["userID"] = uniqid(true);
}