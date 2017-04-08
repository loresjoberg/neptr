<?php


namespace Lore\Neptr\Tome;


use Exception;
use PDO;

class UserGrimoire implements GrimoireInterface
{
    private $incantation = 'SELECT * FROM users WHERE id = ?';


    public function incant(PDO $db, $identifier = null) : array
    {
        $query = $db->prepare($this->incantation);
        $query->execute([$identifier]);

        if ($query === false) {
            throw new Exception('User not found');
        }

        return $query->fetch(PDO::FETCH_ASSOC);
    }
}