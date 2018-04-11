<?php

/**
 * Implementation of the Facebook Open Graph protocol for Spryker
 *
 * @author      Jozsef Geng <jozsef.geng@fondof.de>
 */
namespace FondOfSpryker\Yves\OpenGraph;

use FondOfSpryker\Shared\OpenGraph\OpenGraphConstants;
use Spryker\Yves\Kernel\AbstractBundleConfig;

class OpenGraphConfig extends AbstractBundleConfig
{
    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->get(OpenGraphConstants::ENABLED);
    }
}
