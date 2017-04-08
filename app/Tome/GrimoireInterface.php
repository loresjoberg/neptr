<?php


namespace Lore\Neptr\Tome;


use PDO;

interface GrimoireInterface
{
    public function incant(PDO $db, $identifier = null) : array;
}