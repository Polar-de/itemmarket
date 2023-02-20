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

function AddUserID($userName) {
    $conn = GetDB();
    $stmt = $conn->prepare('SELECT id FROM user WHERE username=?');
    $stmt->bind_param('s', $userName);
    $stmt->execute();

    $result = $stmt->get_result()->fetch_assoc();
    $_SESSION["userID"] = $result['id'];
}

function GetBalance($userID) {
    $conn = GetDB();
    $stmt = $conn->prepare('SELECT credit FROM user WHERE id = ?');
    $stmt->bind_param('s', $userID);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc()['credit'];

    return $result;
}

function GetProfileImage($userID) {
    $conn = GetDB();
    $stmt = $conn->prepare('SELECT imagepath FROM user WHERE id = ?');
    $stmt->bind_param('s', $userID);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc()['imagepath'];

    return $result;
}

function ChangeProfileImg($path, $userID) {
    $conn = GetDB();
    $stmt = $conn->prepare('UPDATE user SET imagepath = ? WHERE id = ?');
    $stmt->bind_param('ss', $path, $userID);
    $stmt->execute();
    header('Location: index.php/profile');
}