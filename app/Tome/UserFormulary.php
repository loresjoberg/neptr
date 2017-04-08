<?php


namespace Lore\Neptr\Tome;


use Lore\Neptr\Model\DataType\Person\EmailAddress;
use Lore\Neptr\Receptacle\Coffer;
use Lore\Neptr\Receptacle\ReliquaryInterface;

class UserFormulary implements FormularyInterface
{
    private $formulas;

    public function __construct() {
        $this->formulas = [
            'EmailAddress' => function () {

            }
        ];
    }

    public function formulate(ReliquaryInterface $reliquary)
    {
        $coffer = new Coffer();
        foreach ($this->formulas as $vessel => $rubric) {
            $coffer->deposit($reliquary->expose($vessel, $rubric));
        }

        return $coffer;
    }
}