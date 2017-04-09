<?php


namespace Lore\Neptr\Tome;

class UserApothecary
{
    private $reliquary;

    public function __construct(array $reliquary) {
        $this->reliquary = $reliquary;
    }

    public function craft()
    {
        // This could be a loop over the $reliquary, would
        // that simplify things or complicate them?
        $coffer['FullName'] = $this->craftFullName();
        $coffer['EmailAddress'] = $this->craftFromKey('email');
        $coffer['Identifier'] =  $this->craftFromKey('id');
        $coffer['Role'] =  $this->craftFromKey('role');
        $coffer['Username'] =  $this->craftFromKey('username');
        $coffer['Password'] =  $this->craftFromKey('passwd');
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