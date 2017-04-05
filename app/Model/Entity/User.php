<?php


namespace Lore\Neptr\Model\Entity;

use Lore\Neptr\Model\Core\ObjectFlattener;
use Lore\Neptr\Model\Manifest\UserManifest;
use Lore\Neptr\Model\Wrangler\UserWrangler;

class User
{
    use ObjectFlattener;

    /** @var UserWrangler */
    private $wrangler;

    /** @var  UserManifest */
    private $manifest;

    public function __construct(UserManifest $manifest, UserWrangler $wrangler)
    {
        $this->wrangler = $wrangler;
        $this->manifest = $manifest;
    }

    public function load($postId) : void
    {
        $this->wrangler->loadById($this->manifest, $postId);
    }

}