<?php


use Lore\Neptr\Artisan\UserApothecary;
use Lore\Neptr\Artisan\UserArtificer;
use Lore\Neptr\Artisan\UserCurator;

require_once '../autoloader.php';
require_once '../vendor/autoload.php';

$db = new PDO('mysql:dbname=neptr;host=localhost', 'neptr', 'neptr');
$userId = 1;

$curator = new UserCurator($db, 1);
$apothecary = new UserApothecary($curator->craft()); // Passes an associative array of scalars
$artificer = new UserArtificer($apothecary->craft()); // Passes an associative array of Monocots
$user = $artificer->craft();
print_r($user);