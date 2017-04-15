<?php


namespace Lore\Neptr\Component;

class Access extends Component
{

    private $role;
    private $loginData;


    public function __construct($role, $loginData)
    {
        $this->role = $role;
        $this->loginData = $loginData;
    }

}