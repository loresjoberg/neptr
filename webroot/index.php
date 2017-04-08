<?php


use Lore\Neptr\Tome\UserCompendium;
use Lore\Neptr\Tome\UserFormulary;
use Lore\Neptr\Tome\UserGrimoire;
use Lore\Neptr\Wright\Apothecary;
use Lore\Neptr\Wright\Curator;

require_once '../autoloader.php';
require_once '../vendor/autoload.php';

$db = new PDO('mysql:dbname=neptr;host=localhost', 'neptr', 'neptr');

$grimoire = new UserGrimoire();
$curator = new Curator($grimoire, $db);
$reliquary = $curator->exhume(1);

$formulary = new UserFormulary();
$apothecary = new Apothecary();
$coffer = $apothecary->mix($formulary, $reliquary);

$compendium = new UserCompendium();
$artificer = new Artificer($compendium, $coffer);
$user = $artificer->assemble();

$user->printContents();