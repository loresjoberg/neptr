<?php


use Lore\Neptr\Model\Core\DataMap;
use Lore\Neptr\Model\Wrangler\PostWrangler;
use PHPUnit\Framework\TestCase;

class PostWranglerTest extends TestCase
{
    public function tearDown()
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testAssembleCreatesContent()
    {
        $content = $this->assembleContent();
        $this->assertEquals('Lore\Neptr\Model\DataType\Content', get_class($content));
    }

    public function testAssembledContentFlattensWithTitle()
    {
        $content = $this->assembleContent();
        $flatContent = $content->flatten();
        $this->assertEquals('Bartleby the Ski Instructor', $flatContent['title']);

    }

    private function assembleContent()
    {
        $map = new DataMap();
        $mockData = new stdClass();
        $mockData->title = 'Bartleby the Ski Instructor';
        $mockData->body = 'Ah Bartleby! Ah humanity!';
        $curator = Mockery::mock('Lore\Neptr\Model\Curator\PostCurator');
        $curator->shouldReceive('loadById')->andReturn($mockData);

        $postWrangler = new PostWrangler($curator, 1);
        return $postWrangler->assemble('Content',$map->getMapFor('Content'));
    }

}
