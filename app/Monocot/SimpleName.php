<?php


namespace Lore\Neptr\Monocot;


use Lore\Neptr\Core\ObjectFlattener;
use Lore\Neptr\Core\Validator;
use Mockery\Exception;

class SimpleName
{
    protected $name;

    use ObjectFlattener;

    public function __construct($name)
    {
        if (!$this->validateName($name)) {
            throw new Exception('Invalid name');
        }

        $this->name = $name;
    }

    private function validateName($name) {
        return Validator::isSimpleStringish($name);
    }
}