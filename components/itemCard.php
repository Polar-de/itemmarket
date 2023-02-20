<?php 
$item = GetItemInfo($itemID);
$traderID = GetTraderID($_SESSION['traderName']);
$traderQuantity = GetItemQuantityFromUser($traderID, $itemID);
$userQuantity = GetItemQuantityFromUser($userID, $itemID);
?>
<div class="itemCard">
    <img src="<?php echo 'assets/' . $item['imagepath']?>" width="150px" height="150px" alt="">
    <div class="itemInfo">
        <h2><?php echo $item['name']; ?></h2>
        <span><?php echo $item['description']; ?></span>
        <div class="sellBuy">
            <div class="sell">
                <h4><?php echo 'Verkaufspreis: ' . ($item['price'] * 90 / 100); ?></h4>
                <p>Im Inventar: <?php echo $userQuantity ?></p>
                <a class="btn btn-small" href="index.php/sell/<?php echo $item['id']; ?>">Verkaufen</a>
            </div>
            <div class="buy">
                <h4><?php echo 'Kaufpreis: ' . $item['price']; ?></h4>
                <p>Auf Lager: <?php echo $traderQuantity ?></p>
                <a class="btn btn-small" href="index.php/buy/<?php echo $item['id']; ?>">Kaufen</a>
            </div>
        </div>
    </div>
</div>
