<?php

function Login($name, $password) {
    $hash = null;
    try {
        $conn = GetDB();
        $stmt = $conn->prepare('SELECT password FROM user WHERE username=?');
        $stmt->bind_param('s', $name);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row === null) {
            // Kein Eintrag in der Datenbank -> Username nicht vergeben
            throw new Exception("Spielername ist nicht vergeben, du musst dich zuerst Registrieren", 1);
        } elseif ($result->fetch_assoc() !== null) {
            // Mehr als ein eintrag für den Username in der Datenbank
            throw new Exception("Fehler bei der Verifizierung, wenden sie sich bitte an den Support", 1);
        } else {
            $hash = $row['password'];
            $stmt->close();
        }
        $passwordIsValid = VerifyPassword($password, $hash);

        if ($passwordIsValid) {
            AddUserName($name);
            AddUserID($_SESSION['userName']);
            header('Location: index.php/shop');
        } else {
            throw new Exception("Das eingegebene Passwort ist falsch.", 1);
        }
        
    } catch (Exception $e) {
        echo $e;
        return false;
    }
}

function VerifyPassword($password, $hash) {
    try {
        // Überprüfen ob das Passwort mit dem aus der Datenbank übereinstimmt
        if (password_verify($password, $hash)) {
            // Überprüfen ob das Passwort mit einem neueren Hash-Algorithmus gehashed werden muss.
            if (password_needs_rehash($hash, PASSWORD_DEFAULT)) {
                $conn = GetDB();
                $newHash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare('UPDATE user SET password = ? WHERE username=?');
                $stmt->bind_param('ss', $newHash, $name);
                $stmt->execute();
                if ($stmt->error) {
                    $stmt->close();
                    throw new Exception($stmt->error, 1);
                }
                $stmt->close();
            }
            return true;
        } else {
            throw new Exception("Das eingegebene Passwort ist falsch.", 1);
        }
    } catch (Exception $e) {
        echo $e;
        return false;
    }
}


function Register(string $password, string $passwordConfirm, string $mail, string $name) {
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
        $conn = GetDB();
        $stmt = $conn->prepare("SELECT * FROM user WHERE username= ? OR email= ?");
        $stmt->bind_param("ss", $name, $mail);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    
        if (mysqli_num_rows($result) > 0) {
            $errors[] = "Benutzername oder Email sind bereits vergeben.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO user (username, email, password) VALUES(?, ?, ?)");
            $stmt->bind_param("sss", $name, $mail, $hashedPassword);
            $stmt->execute();
            $stmterror = $stmt->error;
            $stmt->close();
            $conn->close();
            if ($stmterror) {
                $errors[] = "Fehler bei der Speicherung in der Datenbank!";
            } else {
                AddUserName($name);
                AddUserID($_SESSION['userName']);
                header("Location: ../index.php/shop");
                exit();
            }
        }   
    }
    if (!empty($errors)) {
        foreach ($errors as $error => $value) {
            echo $value . '</br>';
        }
    }
}