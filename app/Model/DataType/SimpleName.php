<?php


namespace Lore\Neptr\Model\DataType;


use Lore\Neptr\Model\Core\ObjectFlattener;
use Lore\Neptr\Model\Core\Validator;
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