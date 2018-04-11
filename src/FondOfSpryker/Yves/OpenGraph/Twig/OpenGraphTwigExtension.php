<?php

/**
 * Implementation of the Facebook Open Graph protocol for Spryker
 *
 * @author      Jozsef Geng <jozsef.geng@fondof.de>
 */

namespace FondOfSpryker\Yves\OpenGraph\Twig;

use FondOfSpryker\Yves\GoogleTagManager\Business\Model\DataLayer\VariableBuilder;
use FondOfSpryker\Yves\GoogleTagManager\Business\Model\DataLayer\VariableBuilderInterface;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Client\Session\SessionClientInterface;
use Spryker\Shared\Twig\TwigExtension;
use Twig_Environment;
use Twig_SimpleFunction;

class OpenGraphTwigExtension extends TwigExtension
{
    const FUNCTION_OPEN_GRAPH = 'fondOfSpykerOpenGraph';

    /**
     * @var bool
     */
    protected $isEnabled;

    /**
     * GoogleTagManagerTwigExtension constructor
     *
     * @param string $containerID
     * @param bool $isEnabled
     * @param \FondOfSpryker\Yves\GoogleTagManager\Business\Model\DataLayer\VariableBuilderInterface $variableBuilder
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     * @param \Spryker\Client\Session\SessionClientInterface $sessionClient
     */
    public function __construct(
        bool $isEnabled
    ) {
        $this->isEnabled = $isEnabled;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            $this->createOpenGraphFunction()
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
     * @param string $templateName
     *
     * @return string
     */
    public function renderOpenGraph(Twig_Environment $twig): string
    {
        if (!$this->isEnabled) {
            return '';
        }


        return $twig->render($this->getTemplateName(), [
            'title' => '',
            'type'  => '',
            'image' => '',
            'url'   => '',
            'description' => '',
            'site_name' => ''
        ]);
    }

    /**
     * @return string
     */
    protected function getTemplateName(): string
    {
        return '@OpenGraph/partials/og.twig';
    }
}
