<?php


namespace Lore\Neptr\Model\DataType;


use Lore\Neptr\Model\Core\ObjectFlattener;

class Content
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