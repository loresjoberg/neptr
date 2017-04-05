<?php


use Lore\Neptr\Model\DataType\Person\EmailAddress;
use PHPUnit\Framework\TestCase;

class EmailAddressTest extends TestCase
{
    public function testWithValidEmail() {
        $emailAddress = new EmailAddress('test@example.com');
        $flatAddress = $emailAddress->flatten();
        $this->assertEquals('test@example.com', $flatAddress['emailAddress']);
    }

    public function testWithInvalidEmail() {
        $this->expectException(Exception::class);
        new EmailAddress('test%example.com');
    }
}
