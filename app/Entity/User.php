<?php


namespace Lore\Neptr\Entity;

class User extends Entity
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