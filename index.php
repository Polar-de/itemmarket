<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('ASSETS_DIR', __DIR__ . '/assets');
define('SITES_DIR', __DIR__ . '/sites');
define('COMPONENTS_DIR', __DIR__ . '/components');
define('CSS_DIR', __DIR__ . '/css');

require __DIR__ . '/utilities.php';
