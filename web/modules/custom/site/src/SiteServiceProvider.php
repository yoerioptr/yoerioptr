<?php

namespace Drupal\site;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;
use Symfony\Component\DependencyInjection\Reference;

final class siteServiceProvider extends ServiceProviderBase {

  public function alter(ContainerBuilder $container): void {
    if ($container->hasDefinition('cache.backend.redis') && $container->hasDefinition('serialization.igbinary_gz')) {
      $container->getDefinition('cache.backend.redis')->setArguments([
        new Reference('redis.factory'),
        new Reference('cache_tags.invalidator.checksum'),
        new Reference('serialization.igbinary_gz'),
      ]);
    }
  }

}
