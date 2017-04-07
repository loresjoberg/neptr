<?php

namespace Lore\Neptr\Model\DataType\Apothecary;

interface Formula
{
    public function formulate(Reliquary $reliquary);
}