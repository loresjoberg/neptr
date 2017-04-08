<?php


namespace Lore\Neptr\Receptacle;

use Closure;

/**
 * Class ReliquaryInterface
 *
 * Responsibility: To contain an array of data created by a CuratorInterface
 *
 * @package Lore\Neptr\Receptacle
 */
interface ReliquaryInterface
{
    public function expose($vessel, Closure $rubric);
}