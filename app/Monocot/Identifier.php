<?php


namespace Lore\Neptr\Monocot;


use Exception;
use Lore\Neptr\Core\Validator;

class Identifier extends Str
{
    public function __construct($str)
    {
        $str = $this->filter($str);
        parent::__construct($str);
    }

    // For our purposes, an Identifier must not be empty,
    // and can contain any characters among [a-z0-9_-.:/], which
    // covers most unique identifier schemas in use.
    // Identifiers cannot contain spaces, and are case-insensitive.
    // Uppercase characters will be converted to lowercase for storage,
    // so the compare() function should be used to test equality.
    private function filter($str) {

        // We validate before converting to lowercase to weed out
        // booleans and other non-stringish entities
        if (!Validator::isStringEquivalent($str)) {
            throw new Exception('Identifiers must be string-equivalents');
        }

        $str = strtolower($str);
        if (!Validator::isIdentifier($str));
    }

    public function compare($value) {
        return ($this->str === (string) strtolower($value));
    }
}