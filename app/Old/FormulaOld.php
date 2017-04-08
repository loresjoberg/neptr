<?php

namespace Lore\Neptr\Model\DataType\Apothecary;

use Closure;

class FormulaOld
{
    public $formulate;

    public function __construct($formula)
    {
        if (! $formula instanceof Closure) {
            $this->formulate = function (Reliquary $components) use ($formula) { return $components->choose($formula); };
            return;
        }

        $this->formulate = $formula;
    }

    public function formulate($object) {
        return ($this->formulate)($object);
    }
}