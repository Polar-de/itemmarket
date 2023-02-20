<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo $mainURL ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css"> 
    <title><?php echo $_SESSION['userName'] ?> Inventar</title>
</head>
<body>
    <?php require_once SITES_DIR . '/header.php'; ?>
    <main>

        <h1><?php echo $_SESSION['userName'] ?> Inventar</h1>

        <div class="itemContainer">
            <?php 
            $items = GetAllInvenoryItems($userID);
            foreach ($items as $item) {
                $itemID = $item['itemID'];
                include COMPONENTS_DIR . '/invItemCard.php';
            }
            ?>
        </div>
    </main>
</body>
</html>
