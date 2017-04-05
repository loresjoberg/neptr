<?php


use Lore\Neptr\Model\DataType\Identity;
use Lore\Neptr\Model\DataType\Moniker;
use Lore\Neptr\Model\DataType\PublicationData;
use Lore\Neptr\Model\DataType\Metadata;
use Lore\Neptr\Model\Entity\User;
use Lore\Neptr\Model\Manifest\UserManifest;
use PHPUnit\Framework\TestCase;

class MetadataTest extends TestCase
{

    public function tearDown()
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testConstructor() {
        /** @var Identity $identity */
        $identity = Mockery::mock('Lore\Neptr\Model\DataType\Identity');

        /** @var PublicationData $publicationData */
        $publicationData = Mockery::mock('\Lore\Neptr\Model\DataType\PublicationData');
        new Metadata($identity, $publicationData);
        $this->addToAssertionCount(1);
    }
}
