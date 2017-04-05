<?php


use Lore\Neptr\Config\AppPath;
use PHPUnit\Framework\TestCase;

class AppPathTest extends TestCase
{
    public function testTemplatePath() {
        $appPath = new AppPath( __DIR__);
        $templatePath = $appPath->templatePath();
        $this->assertEquals(__DIR__ . '/templates', $templatePath);
    }
}
