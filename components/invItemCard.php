<?php 
$item = GetItemInfo($itemID);
$userQuantity = GetItemQuantityFromUser($userID, $itemID);
?>
<div class="itemCard">
    <img src="<?php echo 'assets/' . $item['imagepath']?>" width="150px" height="150px" alt="">
    <div class="itemInfo">
        <h2><?php echo $item['name']; ?></h2>
        <span><?php echo $item['description']; ?></span>
        <div>
            <p>Im Inventar: <?php echo $userQuantity ?></p>
        </div>
    </div>
</div>