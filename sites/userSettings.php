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
    <?php require_once SITES_DIR . '/header.php'; 
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($settings == 'profileImg') {
                ChangeProfileImg($_POST['image'], GetUserID());
            } elseif ($settings == 'password') {

            } elseif ($settings == 'email') {
                
            } elseif ($settings == 'name') {

            } else {
                header('Location: index.php');
            }
        }
    ?>
    <main>
        <?php if($settings === 'password'): ?>
            <div class="authContainer change">
                <form method="post">
                    <label for=""></label>
                    <input type="password" name="" id="">
                    <label for=""></label>
                    <input type="password" name="" id="">
                    <label for=""></label>
                    <input type="password" name="" id="">
                </form>
            </div>


        <!-- Profil Bidl ändern -->
        <?php elseif($settings === 'profileImg'): ?>
            <div class="authContainer change">
                <form method="post">
                    <label for="image">Profilbild wählen:</label>
                    <div>
                        <input type="radio" name="image" id="img1" value="assets/profile/image1.png" checked>
                        <label for="img1"><img src="assets/profile/image1.png" alt=""></label>

                        <input type="radio" name="image" id="img2" value="assets/profile/image2.png">
                        <label for="img2"><img src="assets/profile/image2.png" alt=""></label>

                        <input type="radio" name="image" id="img3" value="assets/profile/image3.png">
                        <label for="img3"><img src="assets/profile/image3.png" alt=""></label>

                        <input type="radio" name="image" id="img4" value="assets/profile/image4.png">
                        <label for="img4"><img src="assets/profile/image4.png" alt=""></label>

                        <input type="radio" name="image" id="img5" value="assets/profile/image5.png">
                        <label for="img5"><img src="assets/profile/image5.png" alt=""></label>

                        <input type="radio" name="image" id="img6" value="assets/profile/image6.png">
                        <label for="img6"><img src="assets/profile/image6.png" alt=""></label>
                </div>
                    <input type="submit" value="Speichern">
                </form>
            </div>
        <?php endif ?>
    </main>
</body>
</html>