<?php


namespace Lore\Neptr\Entity;


use Lore\Neptr\Component\Component;

/**
 * Class Manifest
 *
 * A Manifest is one of two properties that make up an entity, the other being an Identifier. The
 * Identifier being a Monocot string, the Manifest is "everything else," usually in the form
 * of two Component objects that in turn contain other Components and Monocots. Typically
 * the Manifest's two properties represent intrinsic data and metadata related to the object,
 * or natural data (name, address, age) and system data (login name, password, role).
 *
 *
 *
 * @package Lore\Neptr\Entity
 */
class Manifest extends Component
{

}