<?php

namespace Lore\Neptr\Model\DataType\Apothecary;

use Lore\Neptr\Model\Formulary\Formulary;

/**
 * Class ApothecaryConcrete
 *
 * Responsibility: Instantiate first-order objects with data from
 * a Reliquary according to the instructions in a FormularyInterface.
 *
 * @package Lore\Neptr\Model\DataType\ApothecaryConcrete
 */
class ApothecaryConcrete
{

    private $concoction;

    public function concoct(Reliquary $reliquary, Formulary $formulary) : object
    {
        foreach ($formulary as $vessel => $formula) {
            $this->concoction[] = $this->devise($reliquary, $vessel, $formula);
        }

        return new Concoction($this->concoction);
    }

    private function devise(Reliquary $reliquary, Vessel $vessel, Formula $formula) : object
    {
        return new $vessel(...$formula->formulate($reliquary));
    }

}