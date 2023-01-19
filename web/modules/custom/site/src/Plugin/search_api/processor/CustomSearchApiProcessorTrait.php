<?php

namespace Drupal\site\Plugin\search_api\processor;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\search_api\Datasource\DatasourceInterface;
use Drupal\search_api\Item\FieldInterface;
use Drupal\search_api\Item\ItemInterface;
use Drupal\search_api\Processor\ProcessorProperty;

trait CustomSearchApiProcessorTrait {

  public function getPropertyDefinitions(DatasourceInterface $datasource = NULL): array {
    return empty($datasource) ? [
      $this->getPluginId() => new ProcessorProperty(array_filter([
        'type' => $this->getFieldType(),
        'label' => $this->label(),
        'description' => $this->getDescription(),
        'processor_id' => $this->getPluginId(),
        'is_list' => $this->isList() ?: NULL,
      ])),
    ] : [];
  }

  public function addFieldValues(ItemInterface $item): void {
    $fields = $this->getFieldsHelper()->filterForPropertyPath(
      $item->getFields(),
      NULL,
      $this->getPluginId()
    );

    $entity = $item->getOriginalObject()->getValue();
    foreach ($fields as $field) {
      if ($entity instanceof ContentEntityInterface) {
        $this->addContentEntityFieldValues($entity, $field, $item->getLanguage());
      }
    }
  }

  protected function addContentEntityFieldValues(
    ContentEntityInterface $entity,
    FieldInterface $field,
    string $langcode
  ): void {
  }

  abstract protected function getFieldType(): string;

  abstract protected function isList(): bool;

}
