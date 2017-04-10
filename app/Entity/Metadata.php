<?php


namespace Lore\Neptr\Entity;

class Metadata extends Entity
{

    private $identity;

    private $publicationData;

    public function __construct($identity, $publicationData) {
        $this->identity = $identity;
        $this->publicationData = $publicationData;
    }


}