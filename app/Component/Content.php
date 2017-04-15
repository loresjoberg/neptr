<?php

namespace Lore\Neptr\Component;


class Content extends Component
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