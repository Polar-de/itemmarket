<div class="header">
    <a class="logoContainer" href="">
        <img class="logo" src="assets/logo.png" alt="Logo">
    </a>
    <div class="linkContainer">
            <a class="nav-btn" href="">Startseite</a>
            <a class="nav-btn" href="index.php/inventory">Inventar</a>
            <a class="nav-btn" href="index.php/shop">Händler</a>
    </div>
    <div class="navContainer">
        <a class="profileLink" href="index.php/profile"><img class="profileIcon" src="<?php echo GetProfileImage($userID); ?>" alt=""><span><?php echo GetUserName() ?></span></a>
        <a class="balanceLink" href=""><span>Guthaben: <?php echo GetBalance($userID) ?><img class="balanceIcon" src="" alt=""><span id="left" class="tooltip-text">Mit magischer Erde verstärkte Drachenschuppen eignen sich perfekt als Zahlungsmittel</span></a>
    </div>
</div>