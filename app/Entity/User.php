<?php


namespace Lore\Neptr\Entity;

use Lore\Neptr\Component\Component;

class User extends Component
{
    private $personalInfo;
    private $systemInfo;

    /**
     * User constructor.
     * @param $personalInfo
     * @param $systemInfo
     */
    public function __construct(PersonalInfo $personalInfo, SystemInfo $systemInfo)
    {
        $this->personalInfo = $personalInfo;
        $this->systemInfo = $systemInfo;
    }


}