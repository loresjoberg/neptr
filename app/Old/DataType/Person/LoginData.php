<?php


namespace Lore\Neptr\Model\DataType\Person;


use Lore\Neptr\Model\DataType\Moniker;

class LoginData
{
    /** @var  Moniker */
    private $username;

    /** @var  Password */
    private $password;

    /**
     * LoginData constructor.
     * @param Moniker $username
     * @param Password $password
     */
    public function __construct(Moniker $username, Password $password)
    {
        $this->username = $username;
        $this->password = $password;
    }


}