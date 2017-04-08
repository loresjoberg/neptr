<?php


namespace Lore\Neptr\Model\DataType;


use Lore\Neptr\Model\Core\ObjectFlattener;

/**
 * Class Identity
 * @package Lore\Neptr\Model\DataType
 */
class Identity
{
    use ObjectFlattener;

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