<?php


namespace Lore\Neptr\Receptacle;

class Reliquary implements ReceptacleInterface
{
    protected $chamber;

    public function __construct(object $dataObj)
    {
        $this->chamber = json_decode(json_encode($dataObj), true)[0];
    }

    public function deposit($element) : void
    {
        // TODO: Implement deposit() method.
    }

    public function expose($rubric) : object
    {
        return $rubric();
    }
}