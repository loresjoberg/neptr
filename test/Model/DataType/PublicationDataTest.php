<?php


use Lore\Neptr\Model\DataType\PublicationData;
use PHPUnit\Framework\TestCase;

class PublicationDataTest extends TestCase
{
    public function testFlattenReturnsArray() {
        $flatData = $this->getFlatData();
        $this->assertEquals('array', gettype($flatData));
    }

    public function testFlattenReturnsAuthor() {
        $flatData = $this->getFlatData();
        $this->assertEquals('Arthur', $flatData['creator']);
    }

    public function testFlattenReturnsCreationDate() {
        $flatData = $this->getFlatData();
        $this->assertEquals('2001-01-01', $flatData['creationDate']);
    }

    /**
     * @return array
     */
    private function getFlatData(): array
    {
        $data = new stdClass();
        $data->author = 'Arthur';
        $data->publication_date = '2001-01-01';
        $publicationData = new PublicationData($data->author, $data->publication_date);
        $flatData = $publicationData->flatten();
        return $flatData;
    }

}
