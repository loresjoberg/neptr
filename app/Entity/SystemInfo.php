<?php


namespace Lore\Neptr\Entity;

use Lore\Neptr\Core\ObjectFlattener;

class SystemInfo extends Entity
{

    private $identifier;

    private $login;

    use ObjectFlattener;

    public function __construct($identifier, $login)
    {
        $this->identifier = $identifier;
        $this->login = $login;
    }
}