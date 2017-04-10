<?php


namespace Lore\Neptr\Entity;

class User
{
    private $personalInfo;
    private $systemInfo;

    /**
     * User constructor.
     * @param $personalInfo
     * @param $systemInfo
     */
    public function __construct($personalInfo, $systemInfo)
    {
        $this->personalInfo = $personalInfo;
        $this->systemInfo = $systemInfo;
    }


}