<?php

namespace Drupal\site\Plugin\Block;

use Drupal\config_pages\ConfigPagesInterface;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @Block(
 *  id = "branding",
 *  admin_label = @Translation("Branding"),
 * )
 */
final class Branding extends BlockBase implements ContainerFactoryPluginInterface {

  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    private ?ConfigPagesInterface $config
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
  }

  public static function create(
    ContainerInterface $container,
    array $configuration,
    $plugin_id,
    $plugin_definition
  ): self {
    return new self(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('config_pages.loader')->load('site_branding')
    );
  }

  public function build(): array {
    return !is_null($this->config) ? [
      '#theme' => 'branding',
      '#config' => $this->config,
    ] : [
      '#markup' => NULL,
      '#cache' => ['max-age' => -1],
    ];
  }

  public function getCacheTags(): array {
    return $this->config?->getCacheTags() ?? [];
  }

  public function getCacheContexts(): array {
    return $this->config?->getCacheContexts() ?? [];
  }

}
