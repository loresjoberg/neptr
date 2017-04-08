<?php


namespace Lore\Neptr\Tome;


use Lore\Neptr\Receptacle\CofferInterface;

interface CompendiumInterface
{
    public function devise(CofferInterface $coffer);
}