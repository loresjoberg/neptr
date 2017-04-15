<?php


namespace Lore\Neptr\Component;

class SystemInfo extends Component
{

    private $identifier;

    private $login;

    public function __construct($identifier, $login)
    {
        $this->identifier = $identifier;
        $this->login = $login;
    }
}