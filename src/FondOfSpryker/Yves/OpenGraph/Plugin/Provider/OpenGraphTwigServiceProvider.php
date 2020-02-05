<?php

namespace FondOfSpryker\Yves\OpenGraph\Plugin\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Spryker\Yves\Kernel\AbstractPlugin;
use Twig\Environment;

/**
 * @method \FondOfSpryker\Yves\OpenGraph\OpenGraphFactory getFactory()
 */
class OpenGraphTwigServiceProvider extends AbstractPlugin implements ServiceProviderInterface
{
    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function register(Application $app)
    {
        $twigExtension = $this
            ->getFactory()
            ->createOpenGraphTwigExtension();

        $app['twig'] = $app->share(
            $app->extend(
                'twig',
                function (Environment $twig) use ($twigExtension) {
                    $twig->addExtension($twigExtension);

                    return $twig;
                }
            )
        );
    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function boot(Application $app)
    {
    }
}
