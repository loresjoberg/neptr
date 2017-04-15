<?php


namespace Lore\Neptr\Component;


class PersonalInfo extends Component
{

    private $name;

    private $emailAddress;

    public function __construct($name, $emailAddress)
    {
        $this->name = $name;
        $this->emailAddress = $emailAddress;
    }
}