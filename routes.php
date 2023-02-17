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
    $_SESSION['trader'] = 'Dragon';
    require_once SITES_DIR . '/trader.php';
    exit();
}