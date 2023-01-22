<?php

namespace Drupal\facets_views_area\Plugin\views\area;

use Drupal\facets\FacetInterface;
use Drupal\facets\FacetManager\DefaultFacetManager;
use Drupal\search_api\Query\Query;
use Drupal\views\Plugin\views\area\AreaPluginBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @ingroup views_area_handlers
 *
 * @ViewsArea("facets")
 */
final class Facets extends AreaPluginBase {

  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    private readonly DefaultFacetManager $facetManager
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
      $container->get('facets.manager')
    );
  }

  public function render($empty = FALSE): array {
    $build = ['#cache' => ['tags' => ['facets_list']]];

    $facet_source_id = $this->getFacetSourceId();
    $facets = $this->facetManager->getFacetsByFacetSourceId($facet_source_id);

    $sort = function (FacetInterface $facet_1, FacetInterface $facet_2): int {
      return $facet_1->getWeight() <=> $facet_2->getWeight();
    };

    usort($facets, $sort);

    foreach ($facets as $facet) {
      $build[] = $this->facetManager->build($facet)[0];
    }

    return $build;
  }

  /**
   * @todo: This currently only works if the view uses a search api index.
   */
  private function getFacetSourceId(): string {
    /** @var \Drupal\search_api\Query\Query $query */
    $query = $this->view->getQuery()->query();

    if ($query instanceof Query) {
      return 'search_api:' . str_replace(
        ':',
        '__',
        $query->getSearchId()
      );
    }

    return '';
  }

}
