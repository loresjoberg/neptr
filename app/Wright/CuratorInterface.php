<?php


namespace Lore\Neptr\Wright;

use Lore\Neptr\Receptacle\Reliquary;

/**
 * Interface CuratorInterface
 *
 * Responsibility: To move data between the database and a Reliquary.
 *
 * @package Lore\Neptr\Model\CuratorInterface
 */
interface CuratorInterface
{
   public function exhume($identifier) : Reliquary;
   public function inhume(Reliquary $reliquary);
}