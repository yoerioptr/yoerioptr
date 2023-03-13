<?php

namespace Drupal\site\Plugin\search_api\processor;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\search_api\Item\FieldInterface;
use Drupal\search_api\Processor\ProcessorPluginBase;

/**
 * @SearchApiProcessor(
 *   id = "project_date_range",
 *   label = @Translation("Project date range"),
 *   description = @Translation("Adds the dates within the project date range to the index."),
 *   stages = {"add_properties" = 0},
 * )
 */
final class ProjectDateRangeProcessor extends ProcessorPluginBase {

  use CustomSearchApiProcessorTrait;

  protected function getFieldType(): string {
    return 'date';
  }

  protected function isList(): bool {
    return TRUE;
  }

  protected function addContentEntityFieldValues(
    ContentEntityInterface $entity,
    FieldInterface $field,
    string $language
  ): void {

  }

}
