<?php


namespace Lore\Neptr\Monocot;

use Lore\Neptr\Core\Validator;


/**
 * Class Moniker
 *
 * For the purposes of this app, a "moniker" is a human-readable name for something or someone,
 * rendered using only lowercase letters, digits, and hyphens, and which starts with a letter or number.
 * Monikers are expected to be unique in their domain (although this class doesn't test for that)
 * and are used to uniquely identify posts, users, etc. in a human-friendly way.
 *
 * @package Lore\Neptr\Model\DataType
 */
class Moniker
{
    /**
     * @var string
     */
    private $moniker;


    public function __construct($moniker)
    {
        if (!$this->validateMoniker($moniker)) {
            throw new \Exception('Invalid Moniker.');
        }
        $this->moniker = (string) $moniker;

    }

    private function validateMoniker($moniker) {

        if (!Validator::isSimpleStringish($moniker)) {
            return false;
        }

        return preg_match('/^[0-9a-z][0-9a-z-]*$/',$moniker);
    }

}