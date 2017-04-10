<?php


namespace Lore\Neptr\Entity;

use Lore\Neptr\Core\ObjectFlattener;

class PersonalInfo extends Entity
{

    private $name;


    private $emailAddress;

    use ObjectFlattener;

    public function __construct($name, $emailAddress)
    {
        $this->name = $name;
        $this->emailAddress = $emailAddress;
    }
}