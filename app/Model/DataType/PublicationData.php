<?php


namespace Lore\Neptr\Model\DataType;


use Lore\Neptr\Model\Core\ObjectFlattener;

class PublicationData
{
    use ObjectFlattener;

    private $creator;
    private $creationDate;

//    public function __construct($creator, $publicationDate)
    public function __construct($creator, $publicationDate)
    {
        $this->creator = $creator;
        $this->creationDate = $publicationDate;
    }

//    public function load(StdClass $rawData) {
//        $this->creator = $rawData->author;
//        $this->creationDate = $rawData->publication_date;
//    }

}