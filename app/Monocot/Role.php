<?php


namespace Lore\Neptr\Monocot;



use Lore\Neptr\Core\ObjectFlattener;

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