<?php
$userID = GetUserID();

$requestUrl = parse_url($_SERVER['REQUEST_URI']);
$url = $requestUrl['path'];

// Bekommt die Position, an der in der URL index.php anfängt (z.B. itemmarket/index.php = 11)
$index = strpos($url, 'index.php');

$mainURL = $url;
$route = null;

// Abfrage index.php in der Url existiert
if ($index != false) {
    // Schneidet alles ab index.php in der URL ab
    $mainURL = substr($mainURL, 0, $index);
    // $route bekommt die url ab index.php (z.B. index.php/login)
    $route = substr($url, $index);
    // entfernt index.php aus der Route (z.B. /login)
    $route = str_replace('index.php', '', $route);
}

// Falls am Ende der mainURL kein / steht fügt es eins an
if (substr($mainURL, -1) != '/') {
    $mainURL .= '/';
}

// wenn $route falls ist dann wird $route auf / gesetzt, somit wird die startseite aufgerufen
if (!$route) {
    $route = '/';
}

// Weiterleitung auf startseite
if ($route == '/') {
    require_once SITES_DIR . '/start.php';
    exit();
}

// Weiterleitung auf Register Seite
if (strpos($route, '/register') !== false) {
    require_once SITES_DIR . '/register.php';
    exit();
}
if (strpos($route, '/login') !== false) {
    require_once SITES_DIR . '/login.php';
    exit();
}

if (strpos($route, '/shop') !== false) {
    require_once SITES_DIR . '/shop.php';
    exit();
}

if (strpos($route, '/logout') !== false) {
    require_once COMPONENTS_DIR . '/logout.php';
    exit();
}

if (strpos($route, '/profile') !== false) {
    require_once SITES_DIR . '/profile.php';
    exit();
}

// Händler

if (strpos($route, '/drachen') !== false) {
    $_SESSION['traderName'] = 'Drachen';
    require_once SITES_DIR . '/trader.php';
    exit();
}

if (strpos($route, '/potions') !== false) {
    $_SESSION['traderName'] = 'Potions';
    require_once SITES_DIR . '/trader.php';
    exit();
}

if (strpos($route, '/accessoires') !== false) {
    $_SESSION['traderName'] = 'Accessoires';
    require_once SITES_DIR . '/trader.php';
    exit();
}

// // //

if (strpos($route, '/trader') !== false) {
    require_once SITES_DIR . '/trader.php';
    exit();
}

if (strpos($route, '/sell') !== false) {
    $itemID = (int) explode('/', $route)[2];
    $traderID = GetTraderID($_SESSION['traderName']);
    if (CanBuySellAtTrader($itemID)) {
        BuySellItem($userID, $traderID, $itemID);
        AddCredit($userID, GetPrice($itemID) * 90 / 100);
        header('Location: '.$mainURL.'index.php/trader');
        exit();
    }
}

if (strpos($route, '/buy') !== false) {
    $itemID = (int) explode('/', $route)[2];
    $traderID = GetTraderID($_SESSION['traderName']);
    if (CanBuySellAtTrader($itemID) && GetBalance($userID) > GetPrice($itemID)) {
        BuySellItem($traderID, $userID, $itemID);
        RemoveCredit($userID, GetPrice($itemID));
        header('Location: '.$mainURL.'index.php/trader');
        exit();
    }
}

if (strpos($route, '/inventory') !== false) {
    require_once SITES_DIR . '/inventory.php';
    exit();
}