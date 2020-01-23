<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace FondOfSpryker\Yves\OpenGraph\Plugin\Twig;

use Spryker\Service\Container\ContainerInterface;
use Spryker\Shared\TwigExtension\Dependency\Plugin\TwigPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;
use Twig\Environment;
use Twig\TwigFunction;

/**
 * @method \FondOfSpryker\Yves\OpenGraph\OpenGraphFactory getFactory()
 */
class OpenGraphTwigPlugin extends AbstractPlugin implements TwigPluginInterface
{
    protected const TWIG_FUNCTION_OPEN_GRAPH = 'openGraph';

    /**
     * {@inheritdoc}
     *
     * @param \Twig\Environment $twig
     * @param \Spryker\Service\Container\ContainerInterface $container
     *
     * @return \Twig\Environment
     * @api
     *
     */
    public function extend(Environment $twig, ContainerInterface $container): Environment
    {
        $twig = $this->addTwigFunctions($twig);

        return $twig;
    }

    /**
     * @param \Twig\Environment $twig
     *
     * @return \Twig\Environment
     */
    protected function addTwigFunctions(Environment $twig): Environment
    {
        $twig->addFunction($this->createTwigFunction($twig));

        return $twig;
    }

    /**
     * @param \Twig\Environment $twig
     *
     * @return \Twig\TwigFunction
     */
    protected function createTwigFunction(Environment $twig): TwigFunction
    {
        return new TwigFunction(
            static::TWIG_FUNCTION_OPEN_GRAPH,
            function (Environment $twig, array $params) {
                return $this
                    ->getFactory()
                    ->createOpenGraphTwigExtension()->renderOpenGraph($twig, $params);
            },
            [
                'needs_environment' => true,
                'is_safe' => ['html'],
            ]
        );
    }
}
