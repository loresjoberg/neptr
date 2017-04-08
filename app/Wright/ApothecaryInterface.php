<?php


namespace Lore\Neptr\Model\Curator;


use Lore\Neptr\Receptacle\Coffer;

interface ApothecaryInterface
{
    public function mix() : Coffer;
    public function unmix(Coffer $coffer);
}