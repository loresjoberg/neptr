<?php


namespace Lore\Neptr\Model\Wrangler;


use Lore\Neptr\Model\Curator\PostCurator;
use Lore\Neptr\Model\Manifest\UserManifest;

class UserWrangler
{
    /**
     * @var PostCurator
     */
    private $curator;
    private $id;

    public function __construct(PostCurator $curator)
    {
        $this->curator = $curator;
    }

    public function loadById(UserManifest $manifest, int $id) : void
    {
        $this->id = $id;
        $manifest->load($this->curator->loadById($id));
    }


}