<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo $mainURL ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css"> 
    <title>DragonEra Shop</title>
</head>
<body>
    <?php require_once SITES_DIR . '/header.php'; ?>
    <main>
        <img class="logo" src="assets/logo.png" alt="Logo">

        <h1>Items</h1>

        <div class="itemContainer">
            <?php require(COMPONENTS_DIR . '/itemCard.php')?>
        </div>
    </main>
</body>
</html>