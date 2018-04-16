<?php

namespace FondOfSpryker\Yves\OpenGraph;

use Codeception\Test\Unit;
use FondOfSpryker\Yves\OpenGraph\Business\Model\PropertyInterface;
use FondOFSpryker\Yves\OpenGraph\Twig\OpenGraphTwigExtension;

class OpenGraphFactoryTest extends Unit
{

    /**
     * @var \FondOfSpryker\Yves\OpenGraph\OpenGraphConfig |\PHPUnit\Framework\MockObject\MockObject
     */
    protected $configMock;

    /**
     * @var \FondOfSpryker\Yves\OpenGraph\Business\Model\PropertyInterface |\PHPUnit\Framework\MockObject\MockObject
     */
    protected $propertyModelMock;

    /**
     * @return void
     */
    public function _before()
    {
        $this->configMock = $this->getMockBuilder(OpenGraphConfig::class)
            ->disableOriginalConstructor()
            ->setMethods(['isEnabled'])
            ->getMock();

        $this->propertyModelMock = $this->getMockBuilder(PropertyInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @return void
     */
    public function testCreateOpenGraphTwigExtension()
    {
        $this->configMock->expects($this->atLeastOnce())
            ->method('isEnabled')
            ->willReturn(true);


        $openGraphFactory = new OpenGraphFactory();
        $openGraphFactory->setConfig($this->configMock);

        $twigExtension = $openGraphFactory->createOpenGraphTwigExtension();

        $this->assertInstanceOf(OpenGraphTwigExtension::class, $twigExtension);
    }
}
