<?php


namespace Lore\Neptr\Receptacle;

/**
 * Class Reliquary
 *
 * Responsibility: To contain an array of first-order objects
 *
 * @package Lore\Neptr\Receptacle
 */
interface CofferInterface
{
    public function deposit(object $object);
    public function expose(string $instruction);
}