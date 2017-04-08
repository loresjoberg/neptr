<?php


namespace Lore\Neptr\Model\DataType\Person;

use Lore\Neptr\Model\Core\ObjectFlattener;


/**
 * Class Access
 * @package Lore\Neptr\Model\DataType
 */
class Access
{

    use ObjectFlattener;

    /**
     * @var Role
     */
    private $role;

    /**
     * @var LoginData
     */
    private $loginData;

    /**
     * Access constructor.
     * @param Role $role
     * @param LoginData $loginData
     */
    public function __construct(Role $role, LoginData $loginData)
    {
        $this->role = $role;
        $this->loginData = $loginData;
    }


}