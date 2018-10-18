<?php

/**
 * Implementation of the Facebook Open Graph protocol for Spryker
 *
 * @author      Jozsef Geng <gengjozsef86@gmail.com>
 */

namespace FondOfSpryker\Yves\OpenGraph\Twig;

use FondOfSpryker\Yves\OpenGraph\Business\Model\Property;
use FondOfSpryker\Yves\OpenGraph\Business\Model\PropertyInterface;
use FondOfSpryker\Yves\OpenGraph\OpenGraphConfig;
use Generated\Shared\Transfer\OpenGraphPropertiesTransfer;
use Spryker\Shared\Twig\TwigExtension;
use Twig_Environment;
use Twig_SimpleFunction;

class OpenGraphTwigExtension extends TwigExtension
{
    const FUNCTION_OPEN_GRAPH = 'openGraph';

    /**
     * @var bool
     */
    protected $isEnabled;

    /**
     * @var \FondOfSpryker\Yves\OpenGraph\Business\Model\PropertyInterface
     */
    protected $property;

    /**
     * OpenGraphTwigExtension constructor
     *
     * @param bool $isEnabled
     * @param \FondOfSpryker\Yves\OpenGraph\Business\Model\PropertyInterface $property
     */
    public function __construct(
        bool $isEnabled,
        PropertyInterface $property
    ) {
        $this->isEnabled = $isEnabled;
        $this->property = $property;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            $this->createOpenGraphFunction(),
        ];
    }

    /**
     * @return \Twig_SimpleFunction
     */
    protected function createOpenGraphFunction()
    {
        return new Twig_SimpleFunction(
            static::FUNCTION_OPEN_GRAPH,
            [$this, 'renderOpenGraph'],
            [
                'is_safe' => ['html'],
                'needs_environment' => true,
            ]
        );
    }

    /**
     * @param \Twig_Environment $twig
     * @param array $params
     *
     * @return string
     */
    public function renderOpenGraph(Twig_Environment $twig, array $params): string
    {
        if (!$this->isEnabled) {
            return '';
        }

        return $twig->render($this->getTemplateName(), [
            'og' => $this->getOpenGraphProperties($params),
        ]);
    }

    /**
     * @param array $params
     *
     * @return \Generated\Shared\Transfer\OpenGraphPropertiesTransfer
     */
    protected function getOpenGraphProperties(array $params): OpenGraphPropertiesTransfer
    {
        if (array_key_exists('type', $params) && $params['type'] == Property::TYPE_PRODUCT) {
            $storageProductTransfer = $params['product'];
            $config = new OpenGraphConfig();
            $imageSets = $storageProductTransfer->getImageSets();

            if (array_key_exists($config->getProductImageSet(), $imageSets) !== false) {
                $params['image'] = $imageSets[$config->getProductImageSet()][0][$config->getProductImageUrlType()];
            }
        }

        return $this->property->getProperties(
            $this->getProperties($params)
        );
    }

    /**
     * @param array $params
     *
     * @return array
     */
    protected function getProperties(array $params): array
    {
        return [
            'title' => $this->getProperty('title', $params),
            'type' => $this->getProperty('type', $params),
            'url' => $this->getProperty('url', $params),
            'description' => $this->getProperty('description', $params),
            'image' => $this->getProperty('image', $params),
            'site_name' => $this->getProperty('site_name', $params),
            'availability' => $this->getProperty('availability', $params),
        ];
    }

    /**
     * @param string $key
     * @param array $properties
     *
     * @return string
     */
    protected function getProperty($key, $properties): string
    {
        $property = '';

        if (array_key_exists($key, $properties) && isset($properties[$key])) {
            $property = $properties[$key];
        }

        return $property;
    }

    /**
     * @return string
     */
    protected function getTemplateName(): string
    {
        return '@OpenGraph/partials/og.twig';
    }
}
