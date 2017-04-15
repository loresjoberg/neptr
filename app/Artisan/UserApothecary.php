<?php


namespace Lore\Neptr\Artisan;

use Lore\Neptr\Config\Config;
use Lore\Neptr\Receptacle\Reliquary;
use Lore\Neptr\Receptacle\Coffer;

class UserApothecary extends AbstractApothecary
{

    // Now here's where it gets weird. While this Apothecary can
    // theoretically handle any Reliquary, in practice it needs
    // a Reliquary with a specific set of keys.
    public function concoct(Reliquary $reliquary): Coffer
    {
        $chamber = [
            'EmailAddress' => $reliquary['email'],
            'Identifier' => $reliquary['id'],
            'Role' => $reliquary['role'],
            'Username' => $reliquary['login'],
            'Password' => $reliquary['passwd'],
            'FullName' => $this->craftFullName($reliquary)
        ];

        return new Coffer($this->prependKeys($chamber));
    }

    protected function craftFullName($reliquary): string
    {
        return $reliquary['first_name'] . ' ' . $reliquary['last_name'];
    }

    // This will be in every Apothecary, how to handle that?
    private function prependKeys($chamber) {

        foreach ($chamber as $key => $value) {
            $chamber[Config::MONOCOT_PREFIX . $key] = $value;
            unset($chamber[$key]);
        }

        return $chamber;
    }

    public function decoct(Coffer $coffer): void
    {
        // TODO: Implement decoct() method.
    }
}