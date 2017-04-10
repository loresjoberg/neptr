<?php


namespace Lore\Neptr\Artisan;

class UserArtificer extends Artificer
{
    protected $codex = [
        'User' => [
            'PersonalInfo' => [
                'FullName',
                'EmailAddress'
            ],
            'SystemInfo' => [
                'Identifier',
                'Login' => [
                    'Username',
                    'Password'
                ],
            ]
        ]
    ];


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