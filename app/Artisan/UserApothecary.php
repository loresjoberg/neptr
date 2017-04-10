<?php


namespace Lore\Neptr\Artisan;

class UserApothecary
{
    private $reliquary;

    public function __construct($reliquary) {
        $this->reliquary = $reliquary;
    }

    public function craft()
    {
        // This could be a loop over the $reliquary, would
        // that simplify things or complicate them?
        $coffer['Lore\\Neptr\\Monocot\\FullName'] = $this->craftFullName();
        $coffer['Lore\\Neptr\\Monocot\\EmailAddress'] = $this->craftFromKey('email');
        $coffer['Lore\\Neptr\\Monocot\\Identifier'] =  $this->craftFromKey('id');
        $coffer['Lore\\Neptr\\Monocot\\Role'] =  $this->craftFromKey('role');
        $coffer['Lore\\Neptr\\Monocot\\Username'] =  $this->craftFromKey('login');
        $coffer['Lore\\Neptr\\Monocot\\Password'] =  $this->craftFromKey('passwd');
        return $coffer;

    }

    private function craftFromKey($key) {
        return $this->reliquary[$key];
    }

    private function craftFullName() {
        return $this->reliquary['first_name'] . ' ' . $this->reliquary['last_name'];
    }

    public function cleave()
    {
        // TODO: Implement cleave() method.
    }
}