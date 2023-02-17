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

        <h1>Profile</h1>

        <div>
            <?php $data = GetUserInfo() ?>
            <h3><?= $data['username'] ?></h3>
            <h4><?= $data['email'] ?></h4>
            <h4><?= $data['credit'] ?></h4>
        </div>

    </main>
</body>
</html>