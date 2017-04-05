<?php


use Lore\Neptr\Model\Manifest\PostManifest;
use PHPUnit\Framework\TestCase;

class PostManifestTest extends TestCase
{

    public function tearDown()
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testLoadPassesObjectToProperties() {
        $fakeData = new stdClass();
        $fakeData->id = 1;
        $content = Mockery::mock('\Lore\Neptr\Model\DataType\Content');
        $metadata = Mockery::mock('\Lore\Neptr\Model\DataType\Metadata');

        $content->shouldReceive('load')->once()->with($fakeData);
        $metadata->shouldReceive('load')->once()->with($fakeData);

        $post = new PostManifest($content, $metadata);
        $post->load($fakeData);
        $this->addToAssertionCount(1);
    }
}
