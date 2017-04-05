<?php


namespace Lore\Neptr\Model\Wrangler;

use Lore\Neptr\Model\Curator\PostCurator;
use ReflectionClass;

class PostWrangler
{
    /**
     * @var PostCurator
     */
    private $curator;
    private $rawData;

    public function __construct(PostCurator $curator, int $postId = null)
    {
        $this->curator = $curator;
        $this->loadById($postId);
    }

    private function loadById(int $postId): void
    {
        $this->rawData = $this->curator->loadById($postId);
    }

    public function assemble($className, $classMap)
    {
        $reflection_class = new ReflectionClass($this->getLongName($className));
        return $reflection_class->newInstanceArgs(array_map([$this,'rawDataToObjectProperties'], $classMap));
    }

    private function rawDataToObjectProperties($dataField) {
        return $this->rawData->$dataField;
    }

    private function getLongName($className)
    {
        return '\Lore\Neptr\Model\DataType\\' . $className;
    }

}