<?php


namespace Lore\Neptr\Model\Entity;

use Lore\Neptr\Model\Core\ObjectFlattener;
use Lore\Neptr\Model\Manifest\PostManifest;
use Lore\Neptr\Model\Wrangler\PostWrangler;

class Post
{
    use ObjectFlattener;

    /** @var PostWrangler */
    private $wrangler;

    /** @var  PostManifest */
    private $manifest;

    public function __construct(PostManifest $manifest, PostWrangler $wrangler)
    {
        $this->wrangler = $wrangler;
        $this->manifest = $manifest;
    }

    public function load($postId) : void
    {
        $this->wrangler->loadById($this->manifest, $postId);
    }
}