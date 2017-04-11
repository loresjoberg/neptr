<?php


namespace Lore\Neptr\Monocot;

// For our purposes, a "Monocot" is an object that containing
// a single property containing a scalar. Because this is a Web
// application, we provide assorted ways of rendering the
// value.
interface Monocot
{
    public function printHtmlSafe() : void;

    public function printUrlSafe() : void;

    public function printJavascriptSafe() : void;

    public function printLiteral() : void;

}