<?php 

function GetAllItems($traderName) {
    $conn = GetDB();
    $stmt = $conn->prepare('SELECT id FROM items WHERE category = ?');
    $stmt->bind_param('s', $traderName);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result;
}

function GetAllInvenoryItems($userID) {
    $conn = GetDB();
    $stmt = $conn->prepare('SELECT itemID FROM inventory WHERE ownerID = ?');
    $stmt->bind_param('s', $userID);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result;
}

function GetItemInfo($itemID) {
    $conn = GetDB();
    $stmt = $conn->prepare('SELECT * FROM items WHERE id = ?');
    $stmt->bind_param('s', $itemID);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function GetItemQuantityFromUser($userID, $itemID) {
    $conn = GetDB();
    $stmt = $conn->prepare('SELECT quantity FROM inventory WHERE ownerid=? AND itemID=?');
    $stmt->bind_param('ss', $userID, $itemID);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['quantity'];
    } else {
        return 0;
    }
}

function GetPrice($itemID) {
    return GetItemInfo($itemID)['price'];
}