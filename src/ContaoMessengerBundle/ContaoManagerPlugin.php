<?php

declare(strict_types=1);

/*
 * This file is part of the Contao Messenger Bundle.
 *
 * (c) Harald Huber
 *
 * @license LGPL-3.0-or-later
 */

namespace ContaoMessengerBundle;

use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\ManagerPlugin\Routing\RoutingPluginInterface;
use Symfony\Component\Config\Loader\LoaderResolverInterface;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * Plugin for the Contao Manager.
 */
class ContaoManagerPlugin implements BundlePluginInterface, RoutingPluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create('ContaoMessengerBundle\ContaoMessengerBundle')
                ->setLoadAfter(['Contao\CoreBundle\ContaoCoreBundle']),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getRouteCollection(LoaderResolverInterface $resolver, KernelInterface $kernel)
    {
        return $resolver
            ->resolve(__DIR__.'/Resources/config/routing.yml')
            ->load(__DIR__.'/Resources/config/routing.yml')
        ;
    }
}
