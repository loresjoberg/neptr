<?php

namespace Lore\Neptr\Entity;

use Lore\Neptr\Core\ObjectFlattener;

class Content extends Entity
{
    use ObjectFlattener;

    private $title;
    private $body;

    /**
     * Content constructor.
     * @param $title
     * @param $body
     */
    public function __construct($title, $body)
    {
        $this->title = $title;
        $this->body = $body;
    }

}