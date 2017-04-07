<?php


namespace Lore\Neptr\Model\Wrangler;


use Lore\Neptr\Model\Curator\Curator;

class Wrangler
{
    /**
     * @var Curator
     */
    protected $curator;
    protected $rawData;

    public function __construct(Curator $curator, int $postId = null)
    {
        $this->curator = $curator;
        $this->loadById($postId);
    }

    protected function loadById(int $postId): void
    {
        $this->rawData = $this->curator->loadById($postId);
    }
}