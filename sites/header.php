<div class="header">
    <img class="logo" src="assets/logo.png" alt="Logo">
    <div class="navContainer">
        <a class="profileLink" href="index.php/profile"><img class="profileIcon" src="assets/profilePicture.png" alt=""><span><?php echo GetUserName() ?></span></a>
        <a class="balanceLink" href=""><span>Guthaben: <?php echo GetBalance($userID) ?><img class="balanceIcon" src="" alt=""><span id="left" class="tooltip-text">Mit magischer Erde verstärkte Drachenschuppen eignen sich perfekt als Zahlungsmittel</span></a>
    </div>
</div>