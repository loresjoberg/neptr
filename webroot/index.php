<?php


use Lore\Neptr\Artisan\UserApothecary;
use Lore\Neptr\Artisan\UserArtificer;
use Lore\Neptr\Artisan\UserCurator;

require_once '../autoloader.php';
require_once '../vendor/autoload.php';

$db = new PDO('mysql:dbname=neptr;host=localhost', 'neptr', 'neptr');
$userId = 1;

// So we solved the problem by using ArrayObjects instead of arrays.
$curator = new UserCurator(1);
$reliquary = $curator->exhume($db);
$apothecary = new UserApothecary(); // Passes an associative array of scalars
$coffer = $apothecary->concoct($reliquary);
$artificer = new UserArtificer(); // Passes an associative array of Monocots
$user = $artificer->craft($coffer);
print_r($user);