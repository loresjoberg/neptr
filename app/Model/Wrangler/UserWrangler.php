<?php


namespace Lore\Neptr\Model\Wrangler;


use Lore\Neptr\Model\Curator\UserCurator;
use Lore\Neptr\Model\Manifest\UserManifest;

class UserWrangler
{
    /**
     * @var UserCurator
     */
    private $curator;
    private $id;

    public function __construct(UserCurator $curator)
    {
        $this->curator = $curator;
    }

    public function loadById(UserManifest $manifest, int $id) : void
    {
        $this->id = $id;
        $manifest->load($this->curator->loadById($id));
    }


}