<?php


namespace Lore\Neptr\Model\DataType\Person;

use Lore\Neptr\Model\Core\ObjectFlattener;
use Lore\Neptr\Model\DataType\SimpleName;


/**
 * Class PersonalInfo
 * @package Lore\Neptr\Model\DataType
 */
class PersonalInfo
{
    /**
     * @var SimpleName
     */
    private $name;

    /**
     * @var EmailAddress
     */
    private $emailAddress;

    use ObjectFlattener;

    public function __construct(SimpleName $name, EmailAddress $emailAddress)
    {
        $this->name = $name;
        $this->emailAddress = $emailAddress;
    }
}