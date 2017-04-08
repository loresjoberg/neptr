<?php


namespace Lore\Neptr\Model\DataType;


use DateTime;
use Lore\Neptr\Model\Core\ObjectFlattener;
use Lore\Neptr\Model\Entity\User;

class PublicationData
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