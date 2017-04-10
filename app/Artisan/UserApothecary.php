<?php


namespace Lore\Neptr\Artisan;

use Lore\Neptr\Container\Coffer;
use Lore\Neptr\Container\Reliquary;

class UserApothecary
{
    private $cabinet;

    public function __construct(Reliquary $reliquary)
    {
        $this->cabinet = $reliquary;
    }

    public function craft(): Coffer
    {
        // This could be a loop over the $reliquary, would
        // that simplify things or complicate them?
        $coffer['Lore\\Neptr\\Monocot\\FullName'] = $this->craftFullName();
        $coffer['Lore\\Neptr\\Monocot\\EmailAddress'] = $this->craftFromKey('email');
        $coffer['Lore\\Neptr\\Monocot\\Identifier'] = $this->craftFromKey('id');
        $coffer['Lore\\Neptr\\Monocot\\Role'] = $this->craftFromKey('role');
        $coffer['Lore\\Neptr\\Monocot\\Username'] = $this->craftFromKey('login');
        $coffer['Lore\\Neptr\\Monocot\\Password'] = $this->craftFromKey('passwd');
        return new Coffer($coffer);
    }

    private function craftFromKey(string $key) : string
    {
        return $this->cabinet[$key];
    }

    private function craftFullName() : string
    {
        return $this->cabinet['first_name'] . ' ' . $this->cabinet['last_name'];
    }

    public function cleave()
    {
        // TODO: Implement cleave() method.
    }
}