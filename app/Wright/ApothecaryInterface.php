<?php


namespace Lore\Neptr\Wright;


use Lore\Neptr\Receptacle\CofferInterface;
use Lore\Neptr\Receptacle\ReliquaryInterface;
use Lore\Neptr\Tome\FormularyInterface;

interface ApothecaryInterface
{
    public function mix(FormularyInterface $formulary, ReliquaryInterface $reliquary) : CofferInterface;
    public function unmix(CofferInterface $coffer);
}