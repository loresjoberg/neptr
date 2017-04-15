<?php


namespace Lore\Neptr\Component;

use DateTime;
use Lore\Neptr\Entity\User;

class PublicationData extends Component
{

    private $creator;
    private $creationDate;

    public function __construct(User $creator, DateTime $publicationDate)
    {
        $this->creator = $creator;
        $this->creationDate = $publicationDate;
    }

}