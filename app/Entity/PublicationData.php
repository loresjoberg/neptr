<?php


namespace Lore\Neptr\Entity;

use DateTime;
use Lore\Neptr\Core\ObjectFlattener;

class PublicationData extends Entity
{
    use ObjectFlattener;

    private $creator;
    private $creationDate;

    public function __construct(User $creator, DateTime $publicationDate)
    {
        $this->creator = $creator;
        $this->creationDate = $publicationDate;
    }

}