<?php


namespace Lore\Neptr\Core;


class DataMap
{
    private $map;

    public function __construct()
    {
        $this->map = [
            'PublicationData' => [
                'author',
                'publication_date'
            ],
            'Content' => [
                'title',
                'body'
            ],
            'Moniker' => [
                'moniker'
            ]
        ];

    }

    public function getMapFor($dataType) {
        return $this->map[$dataType];
    }
}