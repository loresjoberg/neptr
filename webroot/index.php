<?php

use Lore\Neptr\Config\AppPath;
use Lore\Neptr\Model\Core\ClassFinder;
use Lore\Neptr\Model\Core\DataMap;
use Lore\Neptr\Model\Core\EntityFactory;
use Lore\Neptr\Model\Curator\UserCurator;
use Lore\Neptr\Model\DataType\Apothecary\ApothecaryConcrete;
use Lore\Neptr\Model\DataType\Apothecary\Formula;
use Lore\Neptr\Model\DataType\Apothecary\Vessel;
use Lore\Neptr\Model\DataType\Apothecary\Reliquary;

require_once '../autoloader.php';
require_once '../vendor/autoload.php';

$appPaths = new AppPath(dirname(__DIR__) . '/app');
$db = new PDO('mysql:dbname=neptr;host=localhost', 'neptr', 'neptr');

$classFinder = new ClassFinder('\Lore\\Neptr', $appPaths->classPath());


$curator = new UserCurator($db);
$reliquary = $curator->exhume(1);

function (Reliquary $components) { return $components->choose('name'); };

$formula = new Formula(
    function (Reliquary $components)
    {
        return $components->choose('name');
    }
);

$vessel = new Vessel($classFinder->fullClassName('SimpleName'));

$apothecary = new ApothecaryConcrete($vessel, $reliquary);

$simpleName = $apothecary->concoct($formula);

print_r($simpleName);
exit;

///
$dataMap = new DataMap();
$factory = new EntityFactory($db, $dataMap);
$post = $factory->assemblePost(1);

$loader = new Twig_Loader_Filesystem($appPaths->templatePath());
$twig = new Twig_Environment($loader);

$template = $twig->load('index.html');
echo $template->render($post->flatten());
