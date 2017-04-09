<?php

namespace Lore\Neptr\Wright;

use Lore\Neptr\Receptacle\ReceptacleInterface;
use Lore\Neptr\Tome\TomeInterface;

class Curator implements WrightInterface
{

    public function compose(TomeInterface $grimoire, ReceptacleInterface $db) : object
    {
        return $grimoire->devise($db);
    }

    public function decompose(object $object)
    {
        // TODO: Implement inhume() method.
    }
}