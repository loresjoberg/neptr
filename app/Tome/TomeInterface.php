<?php


namespace Lore\Neptr\Tome;


use Lore\Neptr\Receptacle\ReceptacleInterface;

/**
 * Interface TomeInterface
 *
 * Responsibility: Pass stored rubrics to Receptacle and return created object;
 *
 * Note: All except last return a Receptacle. Maybe Entities are Receptacles?
 * Tomes vary by state and object, meaning each object will require three tomes,
 * one for each step of creation.
 *
 * @package Lore\Neptr\Tome
 */
interface TomeInterface
{
    /**
     * @param ReceptacleInterface $receptacle
     * @return object
     */
    public function devise(ReceptacleInterface $receptacle) : object;
}