<?php


use Lore\Neptr\Model\DataType\Moniker;
use PHPUnit\Framework\TestCase;

class MonikerTest extends TestCase
{
    public function testWithValidMoniker() {
        new Moniker('this-is-acceptable0');
        $this->addToAssertionCount(1);
    }

    public function testWithInvalidMoniker() {
        $this->expectException(Exception::class);
        new Moniker('This is_not accepable!');
    }

    public function testClassThrowsException() {
        $this->expectException(Exception::class);
        $class = new stdClass();
        $class->name = 'this-is-acceptable';
        new Moniker($class);
    }
}
