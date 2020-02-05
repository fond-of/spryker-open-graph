<?php

namespace FondOfSpryker\Yves\OpenGraph\Business\Model;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\OpenGraphPropertiesTransfer;

class PropertyTest extends Unit
{
    /**
     * @var \Generated\Shared\Transfer\OpenGraphPropertiesTransfer
     */
    protected $openGraphTransferMock;

    /**
     * @var \FondOfSpryker\Yves\OpenGraph\Business\Model\Property
     */
    protected $propertyModel;

    /**
     * @return void
     */
    public function _before()
    {
        $this->propertyModel = new Property();
    }

    /**
     * @return void
     */
    public function testGetProperties()
    {
        $params = [
            'title' => 'spryker',
            'type' => 'website',
            'url' => '',
            'description' => 'description',
            'image' => '',
            'site_name' => '',
        ];

        $property = $this->propertyModel->getProperties($params);

        $this->assertInstanceOf(OpenGraphPropertiesTransfer::class, $property);
        $this->assertEquals('spryker', $property->getTitle());
        $this->assertEquals('website', $property->getType());
    }
}
