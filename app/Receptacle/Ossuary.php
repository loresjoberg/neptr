<?php


namespace Lore\Neptr\Receptacle;


use Exception;
use PDO;

class Ossuary implements ReceptacleInterface
{

    private $db;
    private $identifier;

    public function __construct(PDO $db, $identifier)
    {
        $this->db = $db;
        $this->identifier = $identifier;
    }

    public function deposit($entry) : void
    {
        // TODO: Implement deposit() method.
    }

    public function expose($rubric) : object
    {
        $query = $this->db->prepare($rubric);
        $query->execute([$this->identifier]);

        if ($query === false) {
            throw new Exception('User not found');
        }

        return $query->fetch(PDO::FETCH_OBJ);
    }
}