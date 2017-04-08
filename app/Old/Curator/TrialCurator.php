<?php


namespace Lore\Neptr\Model\Curator;


use Lore\Neptr\Model\DataType\Apothecary\Reliquary;

class TrialCurator
{
    public function exhume() {
        $rawRow = new \stdClass();
        $rawRow->name = 'Igby';

        return new Reliquary($rawRow);
    }
}