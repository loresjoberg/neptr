<?php


namespace Lore\Neptr\Model\Manifest;


use Lore\Neptr\Model\DataType\Person\PersonalInfo;
use Lore\Neptr\Model\DataType\Person\Access;

/**
 * Class UserManifest
 * @package Lore\Neptr\Model\Manifest
 */
class UserManifest extends Manifest
{
    /**
     * @var PersonalInfo
     */
    private $personalInfo;
    /**
     * @var Access
     */
    private $access;

    /**
     * UserManifest constructor.
     * @param PersonalInfo $personalInfo
     * @param Access $systemInfo
     */
    public function __construct(PersonalInfo $personalInfo, Access $access)
    {
        $this->personalInfo = $personalInfo;
        $this->access = $access;
    }

    /**
     * @return array
     */
    public function flatten() : array
    {
        return $this->personalInfo->flatten() + $this->access->flatten();
    }

}