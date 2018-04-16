<?php

/**
 * Implementation of the Facebook Open Graph protocol for Spryker
 *
 * @author      Jozsef Geng <gengjozsef86@gmail.com>
 */

namespace FondOfSpryker\Yves\OpenGraph\Business\Model;

interface PropertyInterface
{
    /**
     * @param array $params
     *
     * @return Generated\Shared\Transfer\OpenGraphPropertiesTransfer OpenGraphPropertiesTransfer
     */
    public function getProperties(array $params);
}
