<?php


namespace Lore\Neptr\Wright;

use Lore\Neptr\Receptacle\CofferInterface;
use Lore\Neptr\Tome\CompendiumInterface;


/**
 * Class ArtificerInterface
 *
 * Responsibility: Assemble first-order objects into an EntityOld according to a Codex
 * a
 *
 * @package Lore\Neptr\Model\DataType\ApothecaryConcrete
 */
interface ArtificerInterface
{
    public function assemble(CompendiumInterface $compendium, CofferInterface $coffer);
    public function dissemble();
}