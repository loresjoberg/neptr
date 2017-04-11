<?php


namespace Lore\Neptr\Entity;

class SystemInfo extends Entity
{

    private $identifier;

    private $login;

    public function __construct($identifier, $login)
    {
        $this->identifier = $identifier;
        $this->login = $login;
    }
}