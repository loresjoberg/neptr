<?php

namespace Lore\Neptr\Entity;


class Content extends Entity
{

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