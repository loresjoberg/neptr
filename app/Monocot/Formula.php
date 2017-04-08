<?php

namespace Lore\Neptr\Model\DataType\Apothecary;

/**
 * Interface Formula
 *
 * Responsibility: To return a value from a Reliquary after
 * transforming it.
 *
 * @package Lore\Neptr\Model\DataType\ApothecaryConcrete
 */
interface Formula
{
    public function formulate(Reliquary $reliquary);
}