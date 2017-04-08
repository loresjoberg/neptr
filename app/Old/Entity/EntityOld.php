<?php


namespace Lore\Neptr\Model\Entity;


use Lore\Neptr\Model\Core\ObjectFlattener;
use Lore\Neptr\Model\Manifest\Manifest;
use Lore\Neptr\Model\Wrangler\Wrangler;

/**
 * Class EntityOld
 *
 * Responsibility: To execute business logic
 *
 * @package Lore\Neptr\Model\EntityOld
 */
class EntityOld
{
    use ObjectFlattener;

    /** @var Wrangler */
    protected $wrangler;

    /** @var  Manifest */
    protected $manifest;

    public function __construct(Manifest $manifest, Wrangler $wrangler)
    {
        $this->wrangler = $wrangler;
        $this->manifest = $manifest;
    }

}