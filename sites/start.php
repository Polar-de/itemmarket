<!-- Itemmarket -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo $mainURL ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css"> 
    <title>Dragons Era</title>
</head>
<body>
    <main>
    <?php 
        //require_once SITES_DIR . '/header.php';
    ?> 
    <div class="startContainer">
        <img src="assets/logo.png" alt="Logo">
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
        
        <div class="btnContainer">
            <?php if (!isset($userID)):?>
                <a class="btn register" href="index.php/register">Registrieren</a>
                <a class="btn login" href="index.php/login">Anmelden</a>
            <?php else :?>
                <a class="btn zumShop"  href="index.php/shop">zum Shop</a>
                <a class="btn inventar"  href="index.php/inventory">zum Inventar</a>
            <?php endif?>
        </div>
        
    </div>
    </main>
</body>
</html>