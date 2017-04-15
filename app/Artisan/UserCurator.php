<?php


namespace Lore\Neptr\Artisan;


use Exception;
use Lore\Neptr\Receptacle\Reliquary;
use PDO;


class UserCurator extends AbstractCurator
{

    /**
     * @param PDO $db
     * @return Reliquary
     * @throws Exception
     */
    public function exhume(PDO $db): Reliquary
    {
        $query = $db->prepare('SELECT * FROM users WHERE id = ?');
        $query->execute([$this->identifier]);

        if ($query === false) {
            throw new Exception('User not found');
        }

        return new Reliquary($query->fetch(PDO::FETCH_ASSOC));
    }

    /**
     * @param Reliquary $reliquary
     */
    public function inhume(Reliquary $reliquary): void
    {
        // TODO: Implement inhume() method.
    }
}