<?php


namespace Lore\Neptr\Model\Manifest;


use Lore\Neptr\Model\DataType\Person\PersonalInfo;
use Lore\Neptr\Model\DataType\Person\AccessInfo;

class UserManifest
{
    private $personalInfo;
    private $systemInfo;

    public function __construct(PersonalInfo $personalInfo, AccessInfo $systemInfo)
    {
        $this->personalInfo = $personalInfo;
        $this->systemInfo = $systemInfo;
    }

    public function flatten() : array
    {
        return $this->personalInfo->flatten() + $this->systemInfo->flatten();
    }

}