<?php

namespace Drupal\site\Entity;

interface ParagraphContainingEntityInterface {

  /**
   * @return \Drupal\site\Entity\Paragraph\Paragraph[]
   */
  public function getParagraphs(): array;

  public function hasParagraph(string $paragraph_type): bool;

}
