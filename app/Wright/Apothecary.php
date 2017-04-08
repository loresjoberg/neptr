<?php


namespace Lore\Neptr\Wright;


use Lore\Neptr\Receptacle\Coffer;
use Lore\Neptr\Receptacle\CofferInterface;
use Lore\Neptr\Receptacle\ReliquaryInterface;
use Lore\Neptr\Tome\FormularyInterface;

class Apothecary implements ApothecaryInterface
{

    public function mix(FormularyInterface $formulary, ReliquaryInterface $reliquary): CofferInterface
    {
        return new Coffer($formulary->formulate($reliquary));
    }

    public function unmix(CofferInterface $coffer)
    {
        // TODO: Implement unmix() method.
    }
}