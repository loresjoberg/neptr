<?php


namespace Lore\Neptr\Receptacle;


class Coffer implements CofferInterface
{

    private $chamber;

    public function deposit(object $object)
    {
        $this->chamber[get_class($object)] = $object;
    }

    public function expose(string $instruction)
    {
        return $this->chamber[$instruction];
    }
}