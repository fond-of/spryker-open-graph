<?php

/**
 * Implementation of the Facebook Open Graph protocol for Spryker
 *
 * @author      Jozsef Geng <gengjozsef86@gmail.com>
 */

namespace FondOfSpryker\Yves\OpenGraph\Business\Model;

use Generated\Shared\Transfer\OpenGraphPropertiesTransfer;
use Generated\Shared\Transfer\StorageProductTransfer;

class Property implements PropertyInterface
{
    const TYPE_WEBSITE = "website";
    const TYPE_PRODUCT = "product";


    /**
     * @param  array $params
     *
     * @return Generated\Shared\Transfer\OpenGraphPropertiesTransfer OpenGraphPropertiesTransfer
     */
    public function getProperties(array $params) : OpenGraphPropertiesTransfer
    {
        $transferObject = new OpenGraphPropertiesTransfer();

        $transferObject->setTitle($params['title']);
        $transferObject->setType($params['type']);
        $transferObject->setUrl($params['url']);
        $transferObject->setDescription($params['description']);
        $transferObject->setImage($params['image']);
        $transferObject->setSiteName($params['site_name']);

        return $transferObject;
    }

}