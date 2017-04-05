<?php


namespace Lore\Neptr\Model\DataType\Person;

use Lore\Neptr\Model\Core\ObjectFlattener;

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