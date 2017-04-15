<?php


namespace Lore\Neptr\Entity;

use Lore\Neptr\Component\Component;

class Post extends Component
{
    private $identifier;
    private $quiddity;

    /**
     * User constructor.
     * @param $personalInfo
     * @param $systemInfo
     */
    public function __construct(Identifier $identifier, Quiddity $quiddity)
    {
        $this->personalInfo = $personalInfo;
        $this->systemInfo = $systemInfo;
    }


}