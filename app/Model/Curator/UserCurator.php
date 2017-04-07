<?php

namespace Lore\Neptr\Model\Curator;

use Exception;
use Lore\Neptr\Model\DataType\Apothecary\Reliquary;
use PDO;
use stdClass;

class UserCurator implements Curator
{

    private $db;

    /**
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function exhume($id): Reliquary
    {
        $query = $this->db->prepare('SELECT * FROM users WHERE id = ?');
        $query->execute([$id]);

        if ($query === false) {
            throw new Exception('User not found');
        }

        return new Reliquary($query->fetch(PDO::FETCH_ASSOC));
    }

    public function inhume(Reliquary $reliquary)
    {
        // TODO: Implement inhume() method.
    }
}