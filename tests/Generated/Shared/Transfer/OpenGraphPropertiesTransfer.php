<?php

namespace Generated\Shared\Transfer;

use Spryker\Shared\Kernel\Transfer\AbstractTransfer;

class OpenGraphPropertiesTransfer extends AbstractTransfer
{
    public const TITLE = 'title';

    public const TYPE = 'type';

    public const IMAGE = 'image';

    public const URL = 'url';

    public const DESCRIPTION = 'description';

    public const SITE_NAME = 'siteName';

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $image;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $siteName;

    /**
     * @module Opengraph
     *
     * @param string $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        $this->modifiedProperties[self::TITLE] = true;

        return $this;
    }

    /**
     * @module Opengraph
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @module Opengraph
     *
     * @return $this
     */
    public function requireTitle()
    {
        $this->assertPropertyIsSet(self::TITLE);

        return $this;
    }

    /**
     * @module Opengraph
     *
     * @param string $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        $this->modifiedProperties[self::TYPE] = true;

        return $this;
    }

    /**
     * @module Opengraph
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @module Opengraph
     *
     * @return $this
     */
    public function requireType()
    {
        $this->assertPropertyIsSet(self::TYPE);

        return $this;
    }

    /**
     * @module Opengraph
     *
     * @param string $image
     *
     * @return $this
     */
    public function setImage($image)
    {
        $this->image = $image;
        $this->modifiedProperties[self::IMAGE] = true;

        return $this;
    }

    /**
     * @module Opengraph
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @module Opengraph
     *
     * @return $this
     */
    public function requireImage()
    {
        $this->assertPropertyIsSet(self::IMAGE);

        return $this;
    }

    /**
     * @module Opengraph
     *
     * @param string $url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        $this->modifiedProperties[self::URL] = true;

        return $this;
    }

    /**
     * @module Opengraph
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @module Opengraph
     *
     * @return $this
     */
    public function requireUrl()
    {
        $this->assertPropertyIsSet(self::URL);

        return $this;
    }

    /**
     * @module Opengraph
     *
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        $this->modifiedProperties[self::DESCRIPTION] = true;

        return $this;
    }

    /**
     * @module Opengraph
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @module Opengraph
     *
     * @return $this
     */
    public function requireDescription()
    {
        $this->assertPropertyIsSet(self::DESCRIPTION);

        return $this;
    }

    /**
     * @module Opengraph
     *
     * @param string $siteName
     *
     * @return $this
     */
    public function setSiteName($siteName)
    {
        $this->siteName = $siteName;
        $this->modifiedProperties[self::SITE_NAME] = true;

        return $this;
    }

    /**
     * @module Opengraph
     *
     * @return string
     */
    public function getSiteName()
    {
        return $this->siteName;
    }

    /**
     * @module Opengraph
     *
     * @return $this
     */
    public function requireSiteName()
    {
        $this->assertPropertyIsSet(self::SITE_NAME);

        return $this;
    }
}
