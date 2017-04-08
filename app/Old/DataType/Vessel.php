<?php


namespace Lore\Neptr\Model\DataType;


use Exception;
use Lore\Neptr\Model\Core\Validator;

/**
 * Class Vessel
 *
 * Responsibility: A first-order class containing the name of a class.
 *
 * @package Lore\Neptr\Model\DataType
 */
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