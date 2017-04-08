<?php


namespace Lore\Neptr\Tome;


use Lore\Neptr\Receptacle\Coffer;
use Lore\Neptr\Receptacle\CofferInterface;

class UserCompendium implements CompendiumInterface
{

    private $instructions = [
        'User' => [
            'PersonalInfo' => [
                'FullName',
                'EmailAddress'
            ],
            'SystemInfo' => [
//                'Login' => [
//                    'UserName',
//                    'Password'
//                ],
                [
                    'Identifier',
                    'Role'
                ]
            ]
        ]
    ];

    /** @var  CofferInterface */
    private $coffer;

    private $entity;

    public function devise(CofferInterface $coffer)
    {
        $this->coffer = $coffer;
        return $this->assemble($this->instructions, []);
        $heroes = [
            'Superman',
            'Batman',
            'Wonder Woman'
        ];

        $heroes = [
            0 => 'Superman',
            1 => 'Batman',
            2 => 'Wonder Woman'
        ];

        $heroes[0] = 'Superman';
        $heroes[1] = 'Batman';
        $heroes[2] = 'Wonder Woman';

        $heroes = [
            'Superman' => 'Clark Kent',
            'Batman' => 'Bruce Wayne',
            'Wonder Woman' => 'Diana Prince'
        ];

    }

    public function show($heroes) {
        // Okay, so sending an array as a parameter just gives you a clone of that array
    }

    private function assemble($instruction, $entity) {

        foreach ($instruction as $label => $requisite) {
            if (is_array($requisite)) {
                $parameters = $this->assemble(current($requisite), $entity);
                $entity[] = new $label(...$parameters);
            }

            $entity[] = new $requisite($this->coffer->expose($requisite));
        }

        return $entity;
    }

    /*
     * Iteration 1.1 -- $label = 'User' ; $requisite = [ PersonalInfo => [...], SystemInfo => [...] ]; waits for result of next iteration;
     *      Iteration 2.1a -- $label = 'PersonalInfo'; $requisite = [ 'FullName', 'EmailAddress' ]; Waits for result of next iteration
     *          Iteration 3.1 -- $label = 0; $requisite = 'FullName'; $entity = [ FullNameObject ];
     *          Iteration 3.2 -- $label = 1; $requisite = 'EmailAddress'; $entity = [ FullNameObject, EmailAddressObject ];
     *      Iteration 2.1b -- $parameters = [ FullNameObject, EmailAddressObject ]; $entity = [ PersonalInfoObject(FullNameObject, EmailAddressObject ];
     *      Iteration 2.2a -- $label = 'SystemInfo'; $requisite = [ 'Identifier', 'Role' ]; Waits for result of next iteration
     *          Iteration 4.1 -- $label = 0; $requisite = 'Identifier'; $entity = [ IdentifierObject ];
     *          Iteration 4.2 -- $label = 1; $requisite = 'Role'; $entity = [ IdentifierObject, RoleObject ];
     *      Iteration 2.2b -- $parameters = [ IdentifierObject, RoleObject ]; $entity = [ PersonalInfoObject(FullNameObject, EmailAddressObject, SystemInfoObject(IdentifierObject, RoleObject) ];
     *
     *
     *          Iteration 4 -- Gets string: 'EmailAddress'; $entity = [ FullNameObject, EmailAddressObject ];
     *      Iteration 2 cont. -- $entity = new PersonalInfoObject(FullNameObject, EmailAddressObject);
     *      Iteration 5 -- Gets array: 'SystemInfo'; Waits for result of next iteration
     *          Iteration 6 -- Gets array: 'Login'; Waits for result of next iteration
     *              Iteration 7 -- Gets string: 'UserName'; $entity = [ PersonalInfoObject(FullNameObject, EmailAddressObject), UserNameObject ]
     *              Iteration 8 -- Gets string: 'Password'; $entity = [ PersonalInfoObject(FullNameObject, EmailAddressObject), UserNameObject, PasswordObject ];
     *
     *          WRONG
     *          Iteration 6 cont. -- $entity = new SystemInfoObject(PersonalInfoObject(FullNameObject, EmailAddressObject), FullNameObject, EmailAddressObject);
     *
     *
     *      Iteration 5 cont. -- $entity = new PersonalInfoObject(FullNameObject, EmailAddressObject);
     * Iteration 1 cont. -- $entity = new User(PersonalInfoObject);
     */
}