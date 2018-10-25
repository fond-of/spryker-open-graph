<?php

/**
 * Implementation of the Facebook Open Graph protocol for Spryker
 *
 * @author      Jozsef Geng <gengjozsef86@gmail.com>
 */

namespace FondOfSpryker\Yves\OpenGraph\Business\Model;

use Generated\Shared\Transfer\OpenGraphPropertiesTransfer;

class Property implements PropertyInterface
{
    const TYPE_WEBSITE = "website";
    const TYPE_PRODUCT = "product";

    const SERVER_HTTPS = 'HTTPS';
    const SERVER_PORT = 'SERVER_PORT';
    const SERVER_HTTP_HOST = 'HTTP_HOST';
    const SERVER_REQUEST_URI = 'REQUEST_URI';

    /**
     * @param array $params
     *
     * @return \Generated\Shared\Transfer\OpenGraphPropertiesTransfer OpenGraphPropertiesTransfer
     */
    public function getProperties(array $params): OpenGraphPropertiesTransfer
    {
        $transferObject = new OpenGraphPropertiesTransfer();

        $transferObject->setTitle($params['title']);
        $transferObject->setType($params['type']);
        $transferObject->setUrl($params['url']);
        $transferObject->setDescription($params['description']);
        $transferObject->setImage($params['image']);
        $transferObject->setSiteName($params['site_name']);
        $transferObject->setAvailability($params['availability']);

        return $transferObject;
    }

    /**
     * Using global server variables instead HttpFoundation Request
     * because there is an issue while detecting https protocoll
     *
     * @return string
     */
    protected function getHost(): string
    {
        $protocol = (!empty($_SERVER[static::SERVER_HTTPS]) && $_SERVER[static::SERVER_HTTPS] !== 'off' || $_SERVER[static::SERVER_PORT] == 443) ? "https://" : "http://";
        $domainName = $_SERVER[static::SERVER_HTTP_HOST];
        $uri = ($_SERVER[static::SERVER_REQUEST_URI]) ?: '';

        return $protocol . $domainName . $uri;
    }
}
