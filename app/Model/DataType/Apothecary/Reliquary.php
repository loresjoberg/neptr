<?php


namespace Lore\Neptr\Model\DataType\Apothecary;

use stdClass;

class Reliquary
{
    private $components;

    public function __construct(array $components) {
        $this->$components = $components;
    }

    public function choose($key) {
        return $this->components->$key;
    }
}