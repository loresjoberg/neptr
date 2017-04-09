<?php


use Lore\Neptr\Receptacle\Ossuary;
use Lore\Neptr\Tome\UserCompendium;
use Lore\Neptr\Tome\UserFormulary;
use Lore\Neptr\Tome\UserGrimoire;
use Lore\Neptr\Wright\Apothecary;
use Lore\Neptr\Wright\Artificer;
use Lore\Neptr\Wright\Curator;

require_once '../autoloader.php';
require_once '../vendor/autoload.php';

$db = new PDO('mysql:dbname=neptr;host=localhost', 'neptr', 'neptr');

$ossuary = new Ossuary($db,1);
$grimoire = new UserGrimoire();
$curator = new Curator();
$reliquary = $curator->compose($grimoire, $ossuary);

$formulary = new UserFormulary();
$apothecary = new Apothecary();
$coffer = $apothecary->compose($formulary, $reliquary);

$compendium = new UserCompendium();
$artificer = new Artificer();
$user = $artificer->compose($compendium, $coffer);

$user->printContents();