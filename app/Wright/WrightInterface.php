<?php


namespace Lore\Neptr\Wright;


use Lore\Neptr\Receptacle\ReceptacleInterface;
use Lore\Neptr\Tome\TomeInterface;

/**
 * Interface WrightInterface
 *
 * Responsibility: Pass Tome to Receptacle, return created object
 *
 * Note: At the moment, all Wrights are identical, and nothing more than
 * passthroughs for Tomes. Does this mean we only need one or the other?
 *
 * Generic Ossuary->Specific Grimoire->Generic Curator->
 * Generic Reliquary->Specific Formulary->Generic Apothecary->
 * Generic Coffer->Specific Compendium->Generic Artificer->
 * Entity
 *
 * Generic Ossuary->Specific Curator->
 * Generic Reliquary->Specific Apothecary->
 * Generic Coffer->Specific Artificer->
 * Entity
 *
 * @package Lore\Neptr\Wright
 */
interface WrightInterface
{
    /**
     * @param TomeInterface $tome
     * @param ReceptacleInterface $receptacle
     * @return mixed
     */
    public function compose(TomeInterface $tome, ReceptacleInterface $receptacle) : object;

    /**
     * @param object $object
     * @return mixed
     */
    public function decompose(object $object);
}