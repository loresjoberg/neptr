<?php


namespace Lore\Neptr\Artisan;


use Exception;
use PDO;


class UserCurator implements ArtisanInterface
{
    private $db;
    private $identifier;

    public function __construct(PDO $db, $identifier) {
        $this->db = $db;
        $this->identifier = $identifier;
    }

    public function craft() : array
    {
        $query = $this->db->prepare('SELECT * FROM users WHERE id = ?');
        $query->execute([$this->identifier]);

        if ($query === false) {
            throw new Exception('User not found');
        }

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function cleave()
    {
        // TODO: Implement cleave() method.
    }
}