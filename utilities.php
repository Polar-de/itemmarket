<?php
// Alles wichtige wird included, damit man nicht in jedem Script mehrmals require aufrufen muss.
require_once './functions/database.php';
require_once './functions/user.php';
require_once './functions/authentication.php';
require_once './functions/helper.php';
require_once './functions/items.php';
require_once './functions/traderFunction.php';
require_once './functions/buySell.php';
// config wird geladen in der der Datenbank zugang gespeichert ist
require_once __DIR__ . '/config.php';

require_once __DIR__ . '/routes.php';