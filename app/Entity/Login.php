<?php


namespace Lore\Neptr\Entity;

class Login extends Entity
{
    private $username;
    private $password;


    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }


}