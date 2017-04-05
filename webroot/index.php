<?php

use Lore\Neptr\Config\AppPath;
use Lore\Neptr\Model\Core\DataMap;
use Lore\Neptr\Model\Core\EntityFactory;

require_once '../autoloader.php';
require_once '../vendor/autoload.php';

$appPaths = new AppPath(dirname(__DIR__) . '/app');
$db = new PDO('mysql:dbname=neptr;host=localhost', 'neptr', 'neptr');
$dataMap = new DataMap();
$factory = new EntityFactory($db, $dataMap);
$post = $factory->assemblePost(1);

$loader = new Twig_Loader_Filesystem($appPaths->templatePath());
$twig = new Twig_Environment($loader);

$template = $twig->load('index.html');
echo $template->render($post->flatten());
