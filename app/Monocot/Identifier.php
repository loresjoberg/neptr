<?php


namespace Lore\Neptr\Monocot;


use Exception;
use Lore\Neptr\Core\Validator;

/**
 * Class Identifier
 *
 * The difference between an Entity and other types of Components is the
 * presence of an Identifier.
 *
 * @package Lore\Neptr\Monocot
 */
class Identifier extends StringObject
{
    public function __construct($string)
    {
        $string = $this->filter($string);
        parent::__construct($string);
    }

    // For our purposes, an Identifier must not be empty,
    // and can contain any characters among [a-z0-9_-.:/], which
    // covers most unique identifier schemas in use.
    // Identifiers cannot contain spaces, and are case-insensitive.
    // Uppercase characters will be converted to lowercase for storage,
    // so the compare() function should be used to test equality.
    private function filter($string) {

        // We validate before converting to lowercase to weed out
        // booleans and other non-stringish entities
        if (!Validator::isStringEquivalent($string)) {
            throw new Exception('Identifiers must be string-equivalents');
        }

        $string = strtolower($string);
        if (!Validator::isIdentifier($string)) {
            throw new Exception('Not an identifier: ' . $string);
        }

        return $string;
    }

    public function compare($value) {
        return ($this->string === (string) strtolower($value));
    }
}