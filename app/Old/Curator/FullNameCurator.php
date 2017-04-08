<?php


namespace Lore\Neptr\Model\Curator;


use Lore\Neptr\Model\DataType\Apothecary\Reliquary;
use PDO;

class FullNameCurator implements Curator
{
    private $db;

    /**
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }


    public function exhume($identifier): Reliquary
    {
        // TODO: Implement exhume() method.
    }

    public function inhume(Reliquary $reliquary)
    {
        // TODO: Implement inhume() method.
    }
}