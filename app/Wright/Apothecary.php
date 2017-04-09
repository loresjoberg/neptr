<?php


namespace Lore\Neptr\Wright;


use Lore\Neptr\Receptacle\ReceptacleInterface;
use Lore\Neptr\Tome\TomeInterface;


class Apothecary implements WrightInterface
{

    public function compose(TomeInterface $formulary, ReceptacleInterface $reliquary) : object
    {
        return $formulary->devise($reliquary);
    }

    public function decompose(object $object)
    {
        // TODO: Implement unmix() method.
    }
}