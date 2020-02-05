<?php

namespace FondOfSpryker\Yves\OpenGraph\Business\Model;

interface PropertyInterface
{
    /**
     * @param array $params
     *
     * @return \Generated\Shared\Transfer\OpenGraphPropertiesTransfer OpenGraphPropertiesTransfer
     */
    public function getProperties(array $params);
}
