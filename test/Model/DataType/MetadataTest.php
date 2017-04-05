<?php


use Lore\Neptr\Model\DataType\Identity;
use Lore\Neptr\Model\DataType\Moniker;
use Lore\Neptr\Model\DataType\PublicationData;
use Lore\Neptr\Model\DataType\Metadata;
use PHPUnit\Framework\TestCase;

class MetadataTest extends TestCase
{

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
        $data->id = 1;
        $data->author = 'Arthur';
        $data->publication_date = '2001-01-01';
        $publicationData = new PublicationData($data->author, $data->publication_date);
        $moniker = new Moniker('bartleby-the-ski-instructor');
        $identity = new Identity(1,$moniker);
        $metadata = new Metadata($identity, $publicationData);
        $flatData = $metadata->flatten();
        return $flatData;
    }
}
