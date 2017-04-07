<?php


namespace Lore\Neptr\Config;


class AppPath
{
    private $appRootPath;

    public function __construct(string $path)
    {
        $this->appRootPath = realpath($path);
    }

    public function templatePath() : string
    {
        return $this->appRootPath . '/templates';
    }

    public function classPath() : string {
        return $this->appRootPath;
    }
}