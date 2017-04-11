<?php


namespace Lore\Neptr\Entity;

class Access extends Entity
{

    private $role;
    private $loginData;


    public function __construct($role, $loginData)
    {
        $this->role = $role;
        $this->loginData = $loginData;
    }

}