<?php

/**
 * Implementation of the Facebook Open Graph protocol for Spryker
 *
 * @author      Jozsef Geng <jozsef.geng@fondof.de>
 */
namespace FondOfSpryker\Yves\OpenGraph;

use FondOfSpryker\Yves\OpenGraph\Business\Model\Property;
use FondOfSpryker\Yves\OpenGraph\Business\Model\PropertyInterface;
use FondOfSpryker\Yves\OpenGraph\Twig\OpenGraphTwigExtension;
use Silex\Application;
use Spryker\Yves\Kernel\AbstractFactory;

/**
 * @method \FondOfSpryker\Yves\OpenGraph\OpenGraphConfig getConfig()
 */
class OpenGraphFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Yves\OpenGraph\Twig\OpenGraphTwigExtension
     */
    public function createOpenGraphTwigExtension(): OpenGraphTwigExtension
    {
        return new OpenGraphTwigExtension(
            $this->isEnabled(),
            $this->createPropertyModel()
        );
    }

    /**
     * @return bool
     */
    protected function isEnabled(): bool
    {
        return $this->getConfig()->isEnabled();
    }

    /**
     * @return \FondOfSpryker\Yves\OpenGraph\Business\Model\Property
     */
    protected function createPropertyModel() : PropertyInterface
    {
        return new Property();
    }

}
