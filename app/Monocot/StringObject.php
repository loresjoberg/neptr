<?php


namespace Lore\Neptr\Monocot;

use Lore\Neptr\Core\ObjectFlattener;

abstract class StringObject implements Monocot
{
    protected $string;

    use ObjectFlattener;

    public function __construct(string $string)
    {
        $this->string = (string) $string;
    }

    public function printHtmlSafe() : void
    {
        print filter_var($this->string,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    public function printUrlSafe() : void
    {
        print filter_var($this->string,FILTER_SANITIZE_ENCODED);
    }

    public function printJavascriptSafe() : void
    {
        print json_encode($this->string);
    }

    public function printLiteral() : void
    {
        print $this->string;
    }
}