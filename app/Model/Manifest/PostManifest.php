<?php


namespace Lore\Neptr\Model\Manifest;

use Lore\Neptr\Model\Core\ObjectFlattener;
use Lore\Neptr\Model\DataType\Content;
use Lore\Neptr\Model\DataType\Metadata;
use stdClass;

/**
 * Class PostManifest
 * @package Lore\Neptr\Model\Manifest
 */
class PostManifest
{
    use ObjectFlattener;

    /**
     * @var Content
     */
    private $content;

    /**
     * @var Metadata
     */
    private $metadata;


    public function __construct(Content $content, Metadata $metadata)
    {
        $this->content = $content;
        $this->metadata = $metadata;
    }

    public function load(stdClass $rawRow) : void
    {
        $this->content->load($rawRow);
        $this->metadata->load($rawRow);
    }

}