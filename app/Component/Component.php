<?php


namespace Lore\Neptr\Component;


use Lore\Neptr\Core\ObjectFlattener;

/**
 * Class Component
 *
 *  A "Component," for our purposes, is an object that one or two other objects. Due to
 *  the limitations of Object Calisthenics, a Component can only contain two properties.
 *  Components are the building blocks of Manifests, which are combined with an Identifier
 *  to create an Entity.
 *
 * @package Lore\Neptr\Component
 */
abstract class Component
{
    use ObjectFlattener;
}