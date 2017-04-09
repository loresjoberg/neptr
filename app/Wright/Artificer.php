<?php


namespace Lore\Neptr\Wright;

use Lore\Neptr\Receptacle\ReceptacleInterface;
use Lore\Neptr\Tome\TomeInterface;

class Artificer implements WrightInterface
{

    public function compose(TomeInterface $compendium, ReceptacleInterface $coffer) : object
    {
        return $compendium->devise($coffer);
    }

    public function decompose(object $object)
    {
        // TODO: Implement dissemble() method.
    }
}