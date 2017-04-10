<?php


namespace Lore\Neptr\Core;


use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RecursiveRegexIterator;
use RegexIterator;

class ClassFinder
{
    private $prefix;
    private $baseDir;

    public function __construct(string $prefix, string $baseDir)
    {
        $this->prefix = $prefix;
        $this->baseDir = $baseDir;
    }

    public function fullClassName($shortName) {
        $Directory = new RecursiveDirectoryIterator($this->baseDir);
        $Iterator = new RecursiveIteratorIterator($Directory);
        $Regex = new RegexIterator($Iterator, "/^.*$shortName.php$/i", RecursiveRegexIterator::GET_MATCH);
        foreach ($Regex as $result) {
            $shortName = str_replace($this->baseDir,$this->prefix,$result[0]);
            $shortName = str_replace('/','\\',$shortName);
            $shortName = str_replace('.php','',$shortName);

            return $shortName;
        }

    }
}