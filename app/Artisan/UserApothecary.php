<?php


namespace Lore\Neptr\Artisan;

use Lore\Neptr\Receptacle\Reliquary;

class UserApothecary extends Apothecary
{

    protected function transmute(Reliquary $reliquary) : array
    {

        $chamber = [
            'EmailAddress' => $reliquary['email'],
            'Identifier' => $reliquary['id'],
            'Role' => $reliquary['role'],
            'Username' => $reliquary['login'],
            'Password' => $reliquary['passwd'],
            'FullName' => $this->craftFullName($reliquary)
        ];

        return $chamber;
    }

    protected function craftFullName($reliquary): string
    {
        return $reliquary['first_name'] . ' ' . $reliquary['last_name'];
    }

}