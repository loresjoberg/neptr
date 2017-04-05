<?php


namespace Lore\Neptr\Model\Core;


use Lore\Neptr\Model\Curator\PostCurator;

use Lore\Neptr\Model\DataType\Identity;
use Lore\Neptr\Model\Manifest\PostManifest;
use Lore\Neptr\Model\DataType\Metadata;
use Lore\Neptr\Model\Entity\Post;
use Lore\Neptr\Model\Wrangler\PostWrangler;
use PDO;

class EntityFactory
{
    private $db;
    private $dataMap;

    public function __construct(PDO $db, DataMap $dataMap)
    {
        $this->db = $db;
        $this->dataMap = $dataMap;
    }

    public function assemblePost(int $postId): Post
    {
        // Dependency injection madness...
        $postCurator = new PostCurator($this->db);
        $postWrangler = new PostWrangler($postCurator, $postId);

        $publicationData = $postWrangler->assemble('PublicationData', $this->dataMap->getMapFor('PublicationData'));
        $content = $postWrangler->assemble('Content', $this->dataMap->getMapFor('Content'));
        $moniker = $postWrangler->assemble('Moniker', $this->dataMap->getMapFor('Moniker'));

        $identity = new Identity($postId, $moniker);
        $metadata = new Metadata($identity,$publicationData);
        $manifest = new PostManifest($content, $metadata);

        $post = new Post($manifest, $postWrangler);
        return $post;
    }

}