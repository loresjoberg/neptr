<?php


use Lore\Neptr\Model\DataType\SimpleName;
use PHPUnit\Framework\TestCase;

class SimpleNameTest extends TestCase
{
    public function testConstructor() {
        $name = new SimpleName('Igby Grimper');
        $flatArray = $name->flatten();
        $this->assertEquals('Igby Grimper', $flatArray['name']);
    }

    public function testInvalidConstructorArgument() {
        $this->expectException(Exception::class);
        new SimpleName("Ïgby\nGrimþer");
    }

    public function testVeryInvalidConstructorArgument() {
        $this->expectException(Exception::class);
        $class = new stdClass();
        new SimpleName($class);
    }

    public function testInvalidBooleanConstructorArgument() {
        $this->expectException(Exception::class);
        new SimpleName(true);
    }
}
