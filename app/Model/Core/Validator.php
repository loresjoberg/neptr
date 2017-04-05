<?php


namespace Lore\Neptr\Model\Core;


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

        if(!is_scalar($value)) {
            return false;
        }

        if (is_bool($value)) {
            return false;
        }

        if(!strlen($value)) {
            return false;
        }

        if (preg_match('/[\x00-\x1F\x7F]/', $value)) {
            return false;
        }

        return true;
    }
}