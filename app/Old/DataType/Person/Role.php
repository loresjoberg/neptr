<?php


namespace Lore\Neptr\Model\DataType\Person;


use Lore\Neptr\Model\Core\ObjectFlattener;

class Role
{
    private $role;

    use ObjectFlattener;

    // TODO: Validate this.
    public function __construct($role)
    {
        $this->role = $role;
    }
}