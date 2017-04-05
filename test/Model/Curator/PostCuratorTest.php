<?php


use Lore\Neptr\Model\Curator\PostCurator;
use PHPUnit\Framework\TestCase;

class PostCuratorTest extends TestCase
{
    public function testLoadByIdReturnsPostTitle() {
        $db = new \PDO('mysql:dbname=neptr_test;host=localhost', 'neptr', 'neptr');
        $curator = new PostCurator($db);
        $result = $curator->loadById(1);
        $this->assertEquals('Call Me Neptr', $result->title);
    }
}
