<?php


namespace Lore\Neptr\Entity;


class PersonalInfo extends Entity
{

    private $name;

    private $emailAddress;

    public function __construct($name, $emailAddress)
    {
        $this->name = $name;
        $this->emailAddress = $emailAddress;
    }
}