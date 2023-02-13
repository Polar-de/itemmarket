<?php
session_start(); 
?>
<!-- Itemmarket -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1></h1>

        <?php if (!isset($_SESSION["name"])):?>
        <a href="register.php">Registrieren</a>
        <a href="login.php">Login</a>
        <?php else: ?>
        <a href="./components/logout.php">Logout</a>
        <?php endif;?>
        

        
        <?php 
        if (isset($_SESSION["name"])) {
            echo $_SESSION["name"];
        }
        ?>
    </header>
</body>
</html>