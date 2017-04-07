<?php


namespace Lore\Neptr\Model\Curator;

use Lore\Neptr\Model\DataType\Apothecary\Reliquary;

interface Curator
{
   public function exhume($identifier) : Reliquary;
   public function inhume(Reliquary $reliquary);
}