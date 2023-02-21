<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo $mainURL ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Registrieren</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = clean_data($_POST['name']);
        $mail = clean_data($_POST['mail']);
        $password = $_POST['password'];
        $passwordConfirm = $_POST['passwordConfirm'];

        Register($password, $passwordConfirm, $mail, $name);
        
    }

    ?>
    <div class="authContainer">
        <h1>Registrieren</h1>
        <form action="" method="post">
            <label for="name">Spielername</label>
            <input type="text" placeholder="Spielernamen" name="name">
            <label for="mail">Email</label>
            <input type="mail" placeholder="Email" name="mail">
            <label for="password">Passwort</label>
            <input type="password" placeholder="Passwort" name="password">
            <label for="passwordConfirm">Passwort wiederholen</label>
            <input type="password" placeholder="Passwort wiederholen" name="passwordConfirm">
            <input type="submit" value="Registieren">
        </form>
    </div>
</body>
</html>