<?php


use Lore\Neptr\Model\DataType\Content;
use PHPUnit\Framework\TestCase;

class ContentTest extends TestCase
{
    public function testFlattenReturnsArray() {
        $flatData = $this->getFlatData();
        $this->assertEquals('array', gettype($flatData));
    }

    public function testFlattenReturnsAuthor() {
        $flatData = $this->getFlatData();
        $this->assertEquals('Bartleby the Ski Instructor', $flatData['title']);
    }

    public function testFlattenReturnsCreationDate() {
        $flatData = $this->getFlatData();
        $this->assertEquals('Ah Bartleby! Ah humanity!', $flatData['body']);
    }

    /**
     * @return array
     */
    private function getFlatData(): array
    {
        $data = new stdClass();
        $data->title = "Bartleby the Ski Instructor";
        $data->body = 'Ah Bartleby! Ah humanity!';
        $object = new Content($data->title, $data->body);
        $flatData = $object->flatten();
        return $flatData;
    }
}
