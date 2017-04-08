<?php


namespace Lore\Neptr\Wright;

use Lore\Neptr\Receptacle\ReliquaryInterface;

/**
 * Interface CuratorInterface
 *
 * Responsibility: To move data between the database and a Reliquary.
 *
 * @package Lore\Neptr\Model\CuratorInterface
 */
interface CuratorInterface
{
   public function exhume($identifier) : ReliquaryInterface;
   public function inhume(ReliquaryInterface $reliquary);
}