<?php

namespace Lore\Neptr\Receptacle;

use ArrayObject;
use Lore\Neptr\Config\Config;

class Coffer extends ArrayObject
{

    public function prependNamespaceToKeys()
    {
        $newArray = $this->prependToKeys($this->getArrayCopy(),Config::MONOCOT_PREFIX);
        $this->exchangeArray($newArray);
    }

    public function prependToKeys($array, $prefix) {
        foreach($array as $key => $value) {
            $array[$prefix. $key] = $value;
            unset($array[$key]);
        }

        return $array;
    }

}