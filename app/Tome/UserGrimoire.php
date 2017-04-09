<?php


namespace Lore\Neptr\Tome;


use Lore\Neptr\Receptacle\ReceptacleInterface;
use Lore\Neptr\Receptacle\Reliquary;


class UserGrimoire implements TomeInterface
{
    private $codex = 'SELECT * FROM users WHERE id = ?';


    public function devise(ReceptacleInterface $ossuary) : object
    {
        return new Reliquary($ossuary->expose($this->codex));
    }
}