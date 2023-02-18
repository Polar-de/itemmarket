<?php

function BuySellItem($sellerID, $buyerID, $itemID) {
    if(SellerOwnsItem($sellerID, $itemID)) {
        $conn = GetDB();
        $stmt = $conn->prepare('UPDATE inventory SET quantity = quantity - 1 WHERE ownerID = ? AND itemID = ?');
        $stmt->bind_param('ss', $sellerID, $itemID);
        $stmt->execute();
        $stmt->close();

        if (BuyerOwnsItem($buyerID, $itemID)) {
            $stmt = $conn->prepare('UPDATE inventory SET quantity = quantity + 1 WHERE ownerID = ? AND itemID = ?');
            $stmt->bind_param('ss', $buyerID, $itemID);
            $stmt->execute();
        } else {
            $stmt = $conn->prepare('INSERT INTO inventory (ownerID, itemID, quantity) VALUES (?,?,1)');
            $stmt->bind_param('ss', $buyerID, $itemID);
            $stmt->execute();
        }
    }
}

function SellerOwnsItem($sellerID, $itemID) {
    $conn = GetDB();
    $stmt = $conn->prepare('SELECT quantity FROM inventory WHERE ownerID= ? AND itemID = ?');
    $stmt->bind_param('ss', $sellerID, $itemID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->fetch_assoc()['quantity'] > 0) {
        return true;
    } else {
        return false;
    }
}

function BuyerOwnsItem($buyerID, $itemID) {
    $conn = GetDB();
    $stmt = $conn->prepare('SELECT quantity FROM inventory WHERE ownerID= ? AND itemID = ?');
    $stmt->bind_param('ss', $buyerID, $itemID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function CanBuySellAtTrader($itemID) {
    $itemInfo = GetItemInfo($itemID);
    if ($itemInfo['category'] == $_SESSION['traderName']) {
        return true;
    } else {
        return false;
    }
}



function AddCredit($userID, $amount) {
    $conn = GetDB();
    $stmt = $conn->prepare('UPDATE user SET credit = credit + ? WHERE id = ?');
    $stmt->bind_param('ss', $amount, $userID);
    $stmt->execute();
}

function RemoveCredit($userID, $amount) {
    $conn = GetDB();
    $stmt = $conn->prepare('UPDATE user SET credit = credit - ? WHERE id = ?');
    $stmt->bind_param('ss', $amount, $userID);
    $stmt->execute();
}