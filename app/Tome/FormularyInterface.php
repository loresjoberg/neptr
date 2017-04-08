<?php

namespace Lore\Neptr\Tome;

use Closure;
use Lore\Neptr\Model\DataType\Apothecary\Formula;
use Lore\Neptr\Model\DataType\Apothecary\Vessel;
use Lore\Neptr\Receptacle\ReliquaryInterface;

/**
 * Interface FormularyInterface
 *
 * Responsibility: A container for Vessel-Formula pairs
 *
 * @package Lore\Neptr\Model\FormularyInterface
 */
interface FormularyInterface
{
    public function formulate(ReliquaryInterface $reliquary);
}