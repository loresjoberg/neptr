<?php


namespace Lore\Neptr\Model\DataType;


use Lore\Neptr\Model\Core\ObjectFlattener;

/**
 * Class Metadata
 * @package Lore\Neptr\Model\DataType
 */
class Metadata
{
    use ObjectFlattener;

    /**
     * @var Identity
     */
    private $identity;

    /**
     * @var PublicationData
     */
    private $publicationData;

    /**
     * Metadata constructor.
     * @param Identity $identity
     * @param PublicationData $publicationData
     */
    public function __construct(Identity $identity, PublicationData $publicationData) {
        $this->identity = $identity;
        $this->publicationData = $publicationData;
    }


}