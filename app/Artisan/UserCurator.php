<?php


namespace Lore\Neptr\Artisan;


use Exception;
use Lore\Neptr\Receptacle\Reliquary;
use PDO;


class UserCurator extends Curator
{

    protected function fetch(PDO $db) : array
    {
        $query = $db->prepare('SELECT * FROM users WHERE id = ?');
        $query->execute([$this->identifier]);

        if ($query === false) {
            throw new Exception('User not found');
        }

        return $query->fetch(PDO::FETCH_ASSOC);
    }

}