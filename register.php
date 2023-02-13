<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrieren</title>
</head>
<body>
    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = clean_data($_POST['name']);
        $mail = clean_data($_POST['mail']);
        $password = $_POST['password'];
        $passwordConfirm = $_POST['passwordConfirm'];

        $errors = [];
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Bitte geben Sie eine gültige Email-Adresse an!";
        }            
        if (strlen($password) < 4) {
            $errors[] = "Passwort muss mindestens 4 Zeichen lang sein!";
        }
        if ($password != $passwordConfirm) {
            $errors[] = "Passwörter stimmen nicht überein!";
        }

        if(empty($errors)) {
            require_once("./components/database.php");
            $stmt = $conn->prepare("SELECT * FROM spieler WHERE Spielername= ? OR Email= ?");
            $stmt->bind_param("ss", $name, $mail);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();

            if (mysqli_num_rows($result)) {
                $errors[] = "Benutzername oder Email sind bereits vergeben.";
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO spieler (Spielername, Email, Passwort) VALUES(?, ?, ?)");
                $stmt->bind_param("sss", $name, $mail, $hashedPassword);
                $stmt->execute();
                $stmterror = $stmt->error;
                $stmt->close();
                $conn->close();
                if ($stmterror) {
                    $errors[] = "Fehler bei der Speicherung in der Datenbank!";
                } else {
                    $_SESSION["name"] = $name;
                    header("Location: index.php");
                    exit();
                }
            }   
        }
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        }
       
    }

    function clean_data($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>
    <form action="" method="post">
        <input type="text" placeholder="Spielernamen" name="name">
        <input type="mail" placeholder="Email" name="mail">
        <input type="password" placeholder="Passwort" name="password">
        <input type="password" placeholder="Passwort wiederholen" name="passwordConfirm">
        <input type="submit" value="Registieren">
    </form>
</body>
</html>