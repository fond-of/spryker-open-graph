<?php

/**
 * Google Tag Manager tracking integration for Spryker
 *
 * @author      Jozsef Geng <jozsef.geng@fondof.de>
 */

namespace FondOfSpryker\Yves\GoogleTagManager;

use FondOfSpryker\Yves\OpenGraph\Twig\OpenGraphTwigExtension;
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
            $this->isEnabled()
        );
    }

    /**
     * @return bool
     */
    protected function isEnabled(): bool
    {
        return $this->getConfig()->isEnabled();
    }

}
