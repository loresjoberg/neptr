<?php


namespace Lore\Neptr\Monocot;


use Lore\Neptr\Core\ObjectFlattener;
use Lore\Neptr\Core\Validator;
use Mockery\Exception;

class SimpleName extends StringObject
{
    protected $string;

    public function __construct($string)
    {
        if (!$this->validateName($string)) {
            throw new Exception('Invalid name');
        }

        parent::__construct($string);
    }

    private function validateName($string) {
        return Validator::isSimpleStringish($string);
    }
}