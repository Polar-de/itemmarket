<?php 
session_start();
// Löschen der Session und alle Session Daten
session_destroy();

// Löschen des Session-Cookies (Lebenszeit wird auf die vergangenheit gesetzt)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
// Zurück zur Startseite.
header("Location: ../index.php");
exit();
?>