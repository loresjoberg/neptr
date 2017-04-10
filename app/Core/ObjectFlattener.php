<?php

namespace Lore\Neptr\Core;

use Exception;

trait ObjectFlattener
{

    public function flatten()
    {
        $flatArray = [];
        foreach (get_object_vars($this) as $key => $value) {
            $propertyArray = $this->makeFlat($key, $value);
            $this->checkForKeyCollision($propertyArray, $flatArray);
            $flatArray += $propertyArray;
        }
        return $flatArray;
    }

    private function checkForKeyCollision($propertyArray, $flatArray) {
        if (array_intersect_key($propertyArray, $flatArray)) {
            throw new Exception('Duplicate values are not allowed in flattened array.');
        }
    }

    private function makeFlat($key, $value)
    {
        if (!is_object($value)) {
            return [$key => $value];
        }

        if (!method_exists($value, 'flatten')) {
            return [];
        }

        return $value->flatten();

    }

}