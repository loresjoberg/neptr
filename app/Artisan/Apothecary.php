<?php


namespace Lore\Neptr\Artisan;

use Lore\Neptr\Config\Config;
use Lore\Neptr\Receptacle\Coffer;
use Lore\Neptr\Receptacle\Reliquary;

abstract class Apothecary
{

    public function concoct(Reliquary $reliquary): Coffer
    {
        $chamber = $this->transmute($reliquary);

        return $this->prepareCoffer($chamber);
    }

    protected function prepareCoffer(array $chamber) : Coffer
    {
        $coffer = new Coffer($chamber);
        $coffer->prependToKeys(Config::MONOCOT_PREFIX);
        return $coffer;
    }

    abstract protected function transmute(Reliquary $reliquary);
}