<?php

namespace FondOfSpryker\Yves\OpenGraph;

use Codeception\Test\Unit;
use Silex\Application;

class OpenGraphTwigServiceProviderTest extends Unit
{
    /**
     * @var \Silex\Application |\PHPUnit\Framework\MockObject\MockObject
     */
    protected $applicationMock;

    /**
     * @var \Spryker\Yves\Kernel\Container|\PHPUnit\Framework\MockObject\MockObject|null
     */
    protected $containerMock;

    /**
     * @return void
     */
    public function _before()
    {
        $this->applicationMock = $this->getMockBuilder(Application::class)
            ->disableOriginalConstructor()
            ->setMethods(['render'])
            ->getMock();
    }

    /**
     * @return void
     */
    public function testRegister()
    {
        /*$this->containerMock->expects($this->atLeastOnce())
            ->method('offsetExists')
            ->willReturn(true);

        $serviceProvider = new OpenGraphTwigServiceProvider();
        $serviceProvider->register($this->applicationMock);*/
    }
}
