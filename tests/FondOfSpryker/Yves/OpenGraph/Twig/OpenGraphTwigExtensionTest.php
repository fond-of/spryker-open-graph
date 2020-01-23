<?php

namespace FondOfSpryker\Yves\OpenGraph\Twig;

use Codeception\Test\Unit;
use FondOfSpryker\Yves\OpenGraph\Business\Model\PropertyInterface;
use Twig\Environment;

class OpenGraphTwigExtensionTest extends Unit
{
    /**
     * @var \Generated\Shared\Transfer\OpenGraphPropertiesTransfer
     */
    protected $openGraphTransferMock;

    /**
     * @var \FondOFSpryker\Yves\OpenGraph\Twig\OpenGraphTwigExtension
     */
    protected $openGraphTwigExtension;

    /**
     * @var \FondOfSpryker\Yves\OpenGraph\Business\Model\PropertyInterface |\PHPUnit\Framework\MockObject\MockObject|null
     */
    protected $propertyMock;

    /**
     * @var Twig\Environment
     */
    protected $twigEnvironmentMock;

    /**
     * @return void
     */
    public function _before()
    {

        $this->openGraphTransferMock = $this->getMockBuilder("\Generated\Shared\Transfer\OpenGraphPropertiesTransfer")
            ->disableOriginalConstructor()
            ->getMock();

        $this->propertyMock = $this->getMockBuilder(PropertyInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(['getProperties'])
            ->getMock();

        $this->twigEnvironmentMock = $this->getMockBuilder(Environment::class)
            ->disableOriginalConstructor()
            ->setMethods(['render'])
            ->getMock();

        $this->openGraphTwigExtension = new OpenGraphTwigExtension(
            true,
            $this->propertyMock
        );
    }

    /**
     * @return void
     */
    public function testGetFunction()
    {
        $functions = $this->openGraphTwigExtension->getFunctions();
        $this->assertNotEmpty($functions);
        $this->assertEquals(1, count($functions));
        $this->assertEquals('openGraph', $functions[0]->getName());
    }

    /**
     * @return void
     */
    public function testRenderOpenGraph()
    {
        $this->propertyMock->expects($this->any())
            ->method('getProperties')
            ->willReturn($this->openGraphTransferMock);

        $renderedTemplate = "<meta property=\"og:title\" content=\"title\"/>";
        $this->twigEnvironmentMock->expects($this->any())
            ->method('render')
            ->willReturn($renderedTemplate);

        
        $renderer = $this->openGraphTwigExtension->renderOpenGraph($this->twigEnvironmentMock, []);

        $this->assertNotEmpty($renderer);
    }
}

