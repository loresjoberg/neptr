<?php

namespace Lore\Neptr\Receptacle;

use ArrayObject;

class Coffer extends ArrayObject
{

    public function prependToKeys($string)
    {
        $newArray = [];
        foreach ($this->getArrayCopy() as $key => $value) {
            $newArray[$string . $key] = $value;
        }
        $this->exchangeArray($newArray);
    }

}