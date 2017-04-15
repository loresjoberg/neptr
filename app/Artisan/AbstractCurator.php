<?php


namespace Lore\Neptr\Artisan;


use Lore\Neptr\Monocot\Identifier;
use Lore\Neptr\Receptacle\Reliquary;
use PDO;

/**
 * Class AbstractCurator
 * @package Lore\Neptr\Artisan
 *
 * A Curator is an object that transfers data between a Reliquary
 * and the database. A Curator is associated with a single Entity
 * and stores the identifier associated with that Entity.
 *
 * Individual Curators vary by the SQL statements they use to
 * exhume and inhume data.
 */
abstract class AbstractCurator
{

    /**
     * @var Identifier
     */
    protected $identifier;

    /**
     * AbstractCurator constructor.
     * @param $identifier
     */
    public function __construct(Identifier $identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * @param PDO $db
     * @return Reliquary
     */
    abstract public function exhume(PDO $db): Reliquary;

    /**
     * @param Reliquary $reliquary
     */
    abstract public function inhume(Reliquary $reliquary) : void;

    // My thought here is that there's no reason to enforce the existence
    // of a protected function. Originally inhume() had code in it,
    // but the code just said "Make a Reliquary, fill it with the results
    // of a function, and return it," which is more or less what the
    // function definition says.
    //
    // abstract protected function fetchEntity(PDO $db) : array;
}