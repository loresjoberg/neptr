<?php


namespace Lore\Neptr\Entity;

use Lore\Neptr\Core\ObjectFlattener;

class Access
{

    use ObjectFlattener;


    private $role;


    private $loginData;


    public function __construct($role, $loginData)
    {
        $this->role = $role;
        $this->loginData = $loginData;
    }


}