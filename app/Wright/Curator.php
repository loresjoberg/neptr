<?php

namespace Lore\Neptr\Wright;

use Lore\Neptr\Receptacle\Reliquary;
use Lore\Neptr\Receptacle\ReliquaryInterface;
use Lore\Neptr\Tome\GrimoireInterface;
use PDO;

class Curator implements CuratorInterface
{

    private $db;
    private $grimoire;

    /**
     * @param PDO $db
     */
    public function __construct(GrimoireInterface $grimoire, PDO $db)
    {
        $this->db = $db;
        $this->grimoire = $grimoire;
    }

    public function exhume($identifier): ReliquaryInterface
    {
        return new Reliquary($this->grimoire->incant($this->db, $identifier));
    }

    public function inhume(ReliquaryInterface $reliquary)
    {
        // TODO: Implement inhume() method.
    }
}