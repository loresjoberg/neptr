<?php


namespace Lore\Neptr\Receptacle;

use Closure;

class Reliquary implements ReliquaryInterface
{
    protected $chamber;

    public function __construct(array $array) {
        $this->chamber = $array;
    }

    public function expose($vessel, Closure $rubric) {
        return new $vessel($rubric());
    }
}