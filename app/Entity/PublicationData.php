<?php


namespace Lore\Neptr\Entity;

use DateTime;

class PublicationData extends Entity
{

    private $creator;
    private $creationDate;

    public function __construct(User $creator, DateTime $publicationDate)
    {
        $this->creator = $creator;
        $this->creationDate = $publicationDate;
    }

}