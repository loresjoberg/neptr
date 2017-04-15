<?php


namespace Lore\Neptr\Entity;

use Lore\Neptr\Component\Component;

/**
 * Class Entity
 *
 * An Entity is a combination of an Identifier and a Manifest. The Identifier is a string that
 * uniquely identifies an Entity within its subclass. So, two Users with the same Identifier
 * are representations of the same User (perhaps at different points in time) even if all other
 * properties and sub-properties are different. Conversely, two non-entity Components are
 * representations of different objects, even if they are completely identical.
 *
 * In concrete terms, a Post can change its title and body, and even its author, and still
 * be the same Post. Meanwhile, a Content object can contain the same title and body as another
 * still be a different Post.
 *
 * In this application, an Identity maps to a row in the database, but it could conceivably
 * map to a different unique identifier: A uuid, an ISBN number, or a MAC address.
 *
 * @package Lore\Neptr\Entity
 */
class Entity extends Component
{
    private $identifier;
    private $manifest;
}