<?php

function GetTraderID($traderName) {
    return match ($traderName) {
      'Drachen' => 1,
      'Potions' => 2,
      'Accessoires' => 3,
      default => false,
    };
}
