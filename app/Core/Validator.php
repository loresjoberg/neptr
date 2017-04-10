<?php


namespace Lore\Neptr\Core;


class Validator
{

    // A "simple string" is a string of non-zero length
    // that contains only 7-bit ASCII characters
    // exclusive of control characters. This checks for values
    // that are simple strings or can be typecast verbatim
    // as simple strings (i.e. ints and floats).
    //
    // Note that a multi-line string is not a simple string.
    static function isSimpleStringish($value) {

        if (!self::isStringEquivalent($value)) {
            return false;
        }

        if (preg_match('/[\x00-\x1F\x7F]/', $value)) {
            return false;
        }

        return true;
    }

    /**
     * This checks to see if what you're dealing with makes sense as a non-empty string.
     * Non-scalars that can be cast to a string don't count, and neither do booleans.
     * However, integers and floats are acceptable string equivalents.
     *
     * @param $value
     * @return bool
     */
    static function isStringEquivalent($value) {

        if(!is_scalar($value)) {
            return false;
        }

        if (is_bool($value)) {
            return false;
        }

        if(!strlen($value)) {
            return false;
        }

        return true;
    }

    static function isValidVariableName($value)
    {
        if (!self::isStringEquivalent($value)) {
            return false;
        }

        if (!preg_match("/^[_a-zA-Z][_a-zA-Z0-9]*$/", $value)) {
            return false;
        }

        return true;
    }
}