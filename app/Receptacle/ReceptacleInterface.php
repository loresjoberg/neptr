<?php


namespace Lore\Neptr\Receptacle;


/**
 * Interface ReceptacleInterface
 *
 * Responsibility: Store data (internally or externally), return data according to supplied rubric
 *
 * Note: The nature of rubrics can vary greatly, each type of receptacle will have its own
 * way of processing them. Receptacles vary by state, but not by object. (In other words,
 * different receptacles are necessary for different steps in creating an object,
 * but these receptacles can be used to create any compatible object.
 *
 * @package Lore\Neptr\Receptacle
 */
interface ReceptacleInterface
{
    /**
     * @param $entry
     */
    public function deposit($entry) : void;

    /**
     * @param $rubric
     * @return object
     */
    public function expose($rubric) : object;
}