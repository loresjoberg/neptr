<?php


namespace Lore\Neptr\Model\DataType;


use Exception;
use Lore\Neptr\Model\Core\Validator;

class Vessel
{
    public $name;

    public function __construct($name) {
        if (!Validator::isValidVariableName($name)) {
            throw new Exception('Property name must be a string that is a valid PHP label.');
        }

        $this->name = $name;
    }
}