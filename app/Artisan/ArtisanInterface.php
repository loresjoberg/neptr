<?php


namespace Lore\Neptr\Artisan;


use Lore\Neptr\Receptacle\ReceptacleInterface;

/**
 * Interface ArtisanInterface
 *
 * Responsibility: Pass stored rubrics to Receptacle and return created object;
 *
 * Note: All except last return a Receptacle. Maybe Entities are Receptacles?
 * Tomes vary by state and object, meaning each object will require three tomes,
 * one for each step of creation.
 *
 * @package Lore\Neptr\Artisan
 */
interface ArtisanInterface
{
    /**
     * @return object
     * @internal param null $identifier
     * @internal param ReceptacleInterface $receptacle
     */
    public function craft();
    public function cleave();

}