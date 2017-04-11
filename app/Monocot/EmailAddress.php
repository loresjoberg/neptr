<?php


namespace Lore\Neptr\Monocot;

class EmailAddress extends Str
{


    public function __construct($emailAddress)
    {
        if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception('Invalid email address passed to EmailAddress.');
        }
        parent::__construct($emailAddress);
    }
}