<?php


namespace Lore\Neptr\Artisan;

use Lore\Neptr\Config\Config;
use Lore\Neptr\Receptacle\Coffer;
use Lore\Neptr\Receptacle\Reliquary;

abstract class AbstractApothecary
{
    abstract public function concoct(Reliquary $reliquary): Coffer;
    abstract public function decoct(Coffer $coffer) : void;
}