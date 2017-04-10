<?php


namespace Lore\Neptr\Artisan;

use Lore\Neptr\Container\Coffer;

class UserArtificer implements ArtisanInterface
{

    private $cabinet;
    private $assembleIteration = 0;

    public function __construct(Coffer $coffer)
    {
        $this->cabinet = $coffer;
    }

    public function craft()
    {
        print "<pre>";
        return $this->assemble(

            $codex = [
                'Lore\\Neptr\\Entity\\User' => [
                    'Lore\\Neptr\\Entity\\PersonalInfo' => [
                        'Lore\\Neptr\\Monocot\\FullName',
                        'Lore\\Neptr\\Monocot\\EmailAddress'
                    ],
                    'Lore\\Neptr\\Entity\\SystemInfo' => [
                        'Lore\\Neptr\\Monocot\\Identifier',
                        'Lore\\Neptr\\Entity\\Login' => [
                            'Lore\\Neptr\\Monocot\\Username',
                            'Lore\\Neptr\\Monocot\\Password'
                        ],
//                        [
//                            'Lore\\Neptr\\Monocot\\Role'
//                        ]
                    ]
                ]
            ]

        );
//        print_r($thing);
    }

    private function assemble($instructions)
    {
        $this->assembleIteration++;
        $localOuter = $this->assembleIteration;

//        $this->printIteration($localOuter, 0, 'Starting assemble');

        $entity = [];

        $foreachIteration = 0;

        foreach ($instructions as $label => $requisite) {
            $foreachIteration++;

            if (is_array($requisite)) {
                $entity[] = $this->constructEntity($label, $requisite);
            } else {
                $entity[] = $this->constructMonocot($requisite);
            }

        }

        return $entity;
    }


    public function cleave()
    {
        // TODO: Implement cleave() method.
    }

    private function printTabs($iteration)
    {
        $spaces = ((floor($iteration) - 1) * 4);
        return str_repeat(' ', $spaces);
    }

    private function printIterationNumber($iteration)
    {

        print "Iteration " . $iteration;
    }

    /**
     * @param $label
     * @param $requisite
     */
    private function printArrayInfo($label, $requisite): void
    {
        $this->printLabelInfo($label);
//        $this->printRequisiteInfo($requisite);
    }

    private function printLabelInfo($label)
    {
        print " -- label = " . $label . ";";
    }

    private function printRequisiteInfo($requisite)
    {
        print " requisite = " . json_encode($requisite);

    }

    /**
     * @param $parameters
     */
    private function printParameterInfo($parameters): void
    {
        print " -- parameters = " . serialize($parameters);
    }

    /**
     * @param $entity
     */
    private function printEntityInfo($entity): void
    {
        print "; entity = " . serialize($entity);
    }

    private function constructEntity($label, $requisite)
    {
        $parameters = $this->assemble($requisite);
        return new $label(...$parameters);
    }

    private function constructMonocot($requisite)
    {
        return new $requisite($this->cabinet[$requisite]);
    }

    /**
     * @param $localOuter
     * @param $foreachIteration
     */
    private function printIteration($localOuter, $foreachIteration, $prefix = null): void
    {
        print $this->printTabs($localOuter)
            . $prefix
            . " round "
            . $localOuter
            . '.'
            . $foreachIteration;
    }

    /**
     * @param $localOuter
     * @param $foreachIteration
     * @param $part
     * @param $label
     */
    private function printEntityInfoPart($localOuter, $foreachIteration, $part, $label): void
    {
        $this->printIteration($localOuter, $foreachIteration, '');
        print $part;
        $this->printLabelInfo($label);
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