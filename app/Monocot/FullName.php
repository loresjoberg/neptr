<?php


namespace Lore\Neptr\Monocot;

class FullName extends SimpleName
{

    private $fullname;

    /**
     * FullName constructor.
     * @param $fullname
     */
    public function __construct($fullname)
    {
        parent::__construct($fullname);
        $this->fullname = $fullname;
    }


}