<?php


use Lore\Neptr\Model\DataType\PublicationData;
use Lore\Neptr\Model\Entity\User;
use PHPUnit\Framework\TestCase;

class PublicationDataTest extends TestCase
{

    public function testConstructor() {
        /** @var User $user */
        $user = Mockery::mock('Lore\Neptr\Model\Entity\User');

        /** @var PublicationData $publicationData */
        $date = new DateTime('now');
        new PublicationData($user, $date);
        $this->addToAssertionCount(1);
    }
}
