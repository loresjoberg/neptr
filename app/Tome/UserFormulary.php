<?php


namespace Lore\Neptr\Tome;


use Lore\Neptr\Receptacle\Coffer;
use Lore\Neptr\Receptacle\ReceptacleInterface;

class UserFormulary implements TomeInterface
{
    private $codex;

    public function __construct() {
        $this->codex = [
            'EmailAddress' => function () {
                // Interesting that PhpStorm assumes the closure will
                // act on the current object. Is it wrong or am I?
                return $this->chamber('email');
            }
        ];
    }

    public function devise(ReceptacleInterface $reliquary) : object
    {
        $coffer = new Coffer();
        foreach ($this->codex as $vessel => $rubric) {
            $coffer->deposit(new $vessel($reliquary->expose($rubric)));
        }

        return $coffer;
    }
}