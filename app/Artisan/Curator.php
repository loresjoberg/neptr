<?php


namespace Lore\Neptr\Artisan;


use Lore\Neptr\Receptacle\Reliquary;
use PDO;

abstract class Curator
{

    protected $identifier;

    public function __construct($identifier)
    {
        $this->identifier = $identifier;
    }

    public function exhume(PDO $db): Reliquary
    {
        return new Reliquary($this->fetch($db));
    }

    abstract protected function fetch(PDO $db);
}