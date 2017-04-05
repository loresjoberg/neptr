<?php

use Lore\Neptr\Model\Entity\Post;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    public function tearDown()
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testLoadPassesManifestAndId() {
        $manifest = Mockery::mock('\Lore\Neptr\Model\Manifest\PostManifest');

        $wrangler = Mockery::mock('Lore\Neptr\Model\Wrangler\PostWrangler');
        $post = new Post($manifest, $wrangler);
        $this->addToAssertionCount(1);
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
        $returnData = [
            'id' => 1,
            'creator' => 'Arthur',
            'creationDate' => '2001-01-01'
        ];

        $wrangler = Mockery::mock('Lore\Neptr\Model\Wrangler\PostWrangler');
        $manifest = Mockery::mock('\Lore\Neptr\Model\Manifest\PostManifest');
        $manifest->shouldReceive('flatten')->once()->andReturn($returnData);

        $post = new Post($manifest, $wrangler);
        $flatData = $post->flatten();
        return $flatData;

    }
}
