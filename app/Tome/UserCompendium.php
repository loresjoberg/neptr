<?php


namespace Lore\Neptr\Tome;


use Lore\Neptr\Receptacle\ReceptacleInterface;

class UserCompendium implements TomeInterface
{

    private $codex = [
        'User' => [
            'PersonalInfo' => [
                'FullName',
                'EmailAddress'
            ],
            'SystemInfo' => [
                'Login' => [
                    'UserName',
                    'Password'
                ],
                [
                    'Identifier',
                    'Role'
                ]
            ]
        ]
    ];

    private $coffer

    public function devise(ReceptacleInterface $coffer) : object
    {
        $this->coffer = $coffer;
        return $this->assemble($this->codex);
    }

    /**
     * @param $instructions
     * @return array
     */
    private function assemble($instructions): object
    {

        $entity = [];

        foreach ($instructions as $label => $requisite) {
            if (is_array($requisite)) {
                $parameters = $this->assemble(current($requisite));
                $entity[] = new $label(...$parameters);
            }

            $entity[] = new $requisite($this->coffer->expose($requisite));
        }

        return $entity[0];
    }

    /*
     * Iteration 1.1a -- $label = 'User' ; $requisite = [ PersonalInfo => [...], SystemInfo => [...] ]; waits for result of next iteration;
     *      Iteration 2.1a -- $label = 'PersonalInfo'; $requisite = [ 'FullName', 'EmailAddress' ]; Waits for result of next iteration
     *          Iteration 3.1 -- $label = 0; $requisite = 'FullName'; $entity = [ FullNameObject ];
     *          Iteration 3.2 -- $label = 1; $requisite = 'EmailAddress'; $entity = [ FullNameObject, EmailAddressObject ];
     *      Iteration 2.1b -- $parameters = [ FullNameObject, EmailAddressObject ]; $entity = [ PersonalInfoObject(FullNameObject, EmailAddressObject ];
     *      Iteration 2.2a -- $label = 'SystemInfo'; $requisite = [ 'Identifier', 'Role' ]; Waits for result of next iteration
     *          Iteration 4.1 -- $label = 0; $requisite = 'Identifier'; $entity = [ IdentifierObject ];
     *          Iteration 4.2 -- $label = 1; $requisite = 'Role'; $entity = [ IdentifierObject, RoleObject ];
     *      Iteration 2.2b -- $parameters = [ IdentifierObject, RoleObject ]; $entity = [ PersonalInfoObject(FullNameObject, EmailAddressObject, SystemInfoObject(IdentifierObject, RoleObject) ];
     * Iteration 1.1b -- $parameters = [ PersonalInfoObject(FullNameObject, EmailAddressObject, SystemInfoObject(IdentifierObject, RoleObject) ];, $entity = User(...$parameters);
     *
     */
}