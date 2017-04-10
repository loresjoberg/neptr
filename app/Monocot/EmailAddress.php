<?php


namespace Lore\Neptr\Monocot;


use Lore\Neptr\Core\ObjectFlattener;

class EmailAddress
{
    private $emailAddress;

    use ObjectFlattener;

    public function __construct($emailAddress)
    {
        if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception('Invalid email address passed to EmailAddress.');
        }

        $this->emailAddress = $emailAddress;
    }
}