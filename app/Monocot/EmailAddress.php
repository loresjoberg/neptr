<?php


namespace Lore\Neptr\Monocot;

class EmailAddress extends StringObject
{

    public function __construct($string)
    {
        if (!filter_var($string, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception('Invalid email address passed to EmailAddress.');
        }
        parent::__construct($string);
    }
}