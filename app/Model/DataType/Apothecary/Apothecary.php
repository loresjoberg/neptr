<?php

namespace Lore\Neptr\Model\DataType\Apothecary;

use Lore\Neptr\Model\Formulary\Formulary;

class Apothecary
{

    private $concoction;

    public function concoct(Reliquary $reliquary, Formulary $formulary) : object
    {
        foreach ($formulary as $vessel => $formula) {
            $this->concoction = $this->devise($reliquary, $vessel, $formula);
        }

        return $this->concoction;
    }

    private function devise(Reliquary $reliquary, Vessel $vessel, Formula $formula) : object
    {
        return new $vessel(...$formula->formulate($reliquary));
    }

}