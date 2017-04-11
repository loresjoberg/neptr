<?php


namespace Lore\Neptr\Monocot;

use Lore\Neptr\Core\ObjectFlattener;

abstract class Str implements Monocot
{
    protected $str;

    use ObjectFlattener;

    public function __construct(string $str)
    {
        $this->str = (string) $str;
    }

    public function printHtmlSafe() : void
    {
        print filter_var($this->str,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    public function printUrlSafe() : void
    {
        print filter_var($this->str,FILTER_SANITIZE_ENCODED);
    }

    public function printJavascriptSafe() : void
    {
        print json_encode($this->str);
    }

    public function printLiteral() : void
    {
        print $this->str;
    }
}