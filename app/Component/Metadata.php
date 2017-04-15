<?php


namespace Lore\Neptr\Component;

class Metadata extends Component
{

    private $identity;

    private $publicationData;

    public function __construct($identity, $publicationData) {
        $this->identity = $identity;
        $this->publicationData = $publicationData;
    }


}