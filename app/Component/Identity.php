<?php


namespace Lore\Neptr\Component;

use Lore\Neptr\Monocot\Moniker;


/**
 * Class Identity
 * @package Lore\Neptr\Model\DataType
 */
class Identity extends Component
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var Moniker
     */
    private $moniker;

    public function __construct(int $id, Moniker $moniker) {
        $this->id = $id;
        $this->moniker = $moniker;
    }

}