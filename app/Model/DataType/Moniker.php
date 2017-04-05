<?php


namespace Lore\Neptr\Model\DataType;


/**
 * Class Moniker
 *
 * For the purposes of this app, a "moniker" is a human-readable name for something or someone,
 * unique within its domain, rendered with a limited set of characters. For example, a person's
 * username may be a Moniker.
 *
 * @package Lore\Neptr\Model\DataType
 */
class Moniker
{
    /**
     * @var string
     */
    private $moniker;

    /**
     * Moniker constructor.
     * @param string $moniker
     */

    public function __construct($moniker)
    {
        $this->moniker = $moniker;
    }


}