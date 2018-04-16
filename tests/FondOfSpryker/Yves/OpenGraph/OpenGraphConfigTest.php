<?php

namespace FondOfSpryker\Yves\OpenGraph;

use Codeception\Test\Unit;
use org\bovigo\vfs\vfsStream;

class OpenGraphConfigTest extends Unit
{
    /**
     * @var \org\bovigo\vfs\vfsStreamDirectory
     */
    protected $vfsStreamDirectory;

    /**
     * @return void
     */
    public function _before()
    {
        $this->vfsStreamDirectory = vfsStream::setup('root', null, [
            'config' => [
                'Shared' => [
                    'stores.php' => file_get_contents(codecept_data_dir('stores.php')),
                    'config_default.php' => file_get_contents(codecept_data_dir('config_default.php')),
                ],
            ],
        ]);
    }

    /**
     * @return void
     */
    public function testGetProductImageSet()
    {
        $openGraphConfig = new OpenGraphConfig();

        $this->assertEquals('default', $openGraphConfig->getProductImageSet());
    }

    /**
     * @return void
     */
    public function testGetProductImageUrlType()
    {
        $openGraphConfig = new OpenGraphConfig();

        $this->assertEquals('externalUrlLarge', $openGraphConfig->getProductImageUrlType());
    }

    /**
     * @return void
     */
    public function testGetIsEnabled()
    {
        $gopenGraphConfig = new OpenGraphConfig();

        $this->assertEquals(true, (bool)$gopenGraphConfig->isEnabled());
    }
}
