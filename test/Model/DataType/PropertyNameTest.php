<?php


use Lore\Neptr\Model\DataType\Vessel;
use PHPUnit\Framework\TestCase;

class PropertyNameTest extends TestCase
{
    public function testWithValidPropertyName() {
        new Vessel('thisIsAcceptable');
        $this->addToAssertionCount(1);
    }

    public function testWithInvalidPropertyName() {
        $this->expectException(Exception::class);
        new Vessel('This is_not accepable!');
    }

    public function testClassThrowsException() {
        $this->expectException(Exception::class);
        $class = new stdClass();
        $class->name = 'thisIsUnacceptableBecauseItIsWrappedInAClass';
        new Vessel($class);
    }
}
