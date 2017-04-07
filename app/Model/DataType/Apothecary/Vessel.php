<?php


namespace Lore\Neptr\Model\DataType\Apothecary;


use Exception;
use Lore\Neptr\Model\Core\Validator;

class Vessel
{
    public $name;

    public function __construct($className) {
//        if (!Validator::isValidVariableName($className)) {
//            throw new Exception('Property name must be a string that is a valid PHP label.');
//        }

        $this->name = $className;
    }
}