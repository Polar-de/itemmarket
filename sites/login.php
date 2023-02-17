<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo $mainURL ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
   <title>Login</title>
</head>
<body>

<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = clean_data($_POST['name']);
        $password = $_POST['password'];
        Login($name, $password);
    }
?>
<div class="authContainer">
    <h1>Anmelden</h1>
    <form action="" method="post">
        <label for="name">Spielername</label>
        <input type="text" placeholder="Spielernamen" name="name">
        <label for="password">Passwort</label>
        <input type="password" placeholder="Passwort" name="password">
        <input type="submit" value="Anmelden">
    </form>
</div>

</body>
</html>