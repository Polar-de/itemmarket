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
        <div class="profileContainer">
            <div class="profileInfo">
                <h1>Profil Info</h1>
                <?php $data = GetUserInfo() ?>
                <h3>Spielername: <?= $data['username'] ?></h3>
                <h4>Email: <?= $data['email'] ?></h4>
                <h4>Drachenschuppen: <?= $data['credit'] ?></h4>
                <a class="btn btn-small" href="index.php/logout">Abmelden</a>
            </div>
            
            <div class="profileSettings">
                <a class="btn btn-small" href="index.php/change/img">Profilbild ändern</a>
                <a class="btn btn-small" href="index.php/change/name">Spielername ändern</a>
                <a class="btn btn-small" href="index.php/change/email">Email ändern</a>
                <a class="btn btn-small" href="index.php/change/password">Passwort ändern</a>
            </div>
        </div>
    </main>
</body>
</html>