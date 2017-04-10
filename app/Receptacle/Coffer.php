<?php

namespace Lore\Neptr\Receptacle;

use ArrayObject;

class Coffer extends ArrayObject
{

    public function __construct($input = [], $flags = 0, $iterator_class = "ArrayIterator")
    {
//        $flags = self::ARRAY_AS_PROPS;
        parent::__construct($input, $flags, $iterator_class);
    }

    public function prependToKeys($string)
    {
        $newArray = [];
        foreach ($this->getArrayCopy() as $key => $value) {
            $newArray[$string . $key] = $value;
        }
        $this->exchangeArray($newArray);
    }

}