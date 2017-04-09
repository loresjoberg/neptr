<?php


namespace Lore\Neptr\Receptacle;


class Coffer implements ReceptacleInterface
{

    private $chamber;

    public function deposit($object) : void
    {
        $this->chamber[get_class($object)] = $object;
    }

    public function expose($rubric) : object
    {
        return $this->chamber[$rubric];
    }
}