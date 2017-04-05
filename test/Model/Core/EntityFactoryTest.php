<?php


use Lore\Neptr\Model\Core\DataMap;
use Lore\Neptr\Model\Core\EntityFactory;
use PHPUnit\Framework\TestCase;

class EntityFactoryTest extends TestCase
{
    public function testAssemblePostReturnsPostObject() {
        $map = new DataMap();
        $db = new \PDO('mysql:dbname=neptr_test;host=localhost', 'neptr', 'neptr');
        $factory = new EntityFactory($db, $map);
        $post = $factory->assemblePost(1);
        $this->assertEquals('Lore\Neptr\Model\Entity\Post', get_class($post));
    }
}
