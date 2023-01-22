<?php

namespace Drupal\site\Entity;

trait ParagraphContainingEntityTrait {

  /**
   * @return \Drupal\site\Entity\Paragraph\Paragraph[]
   */
  public function getParagraphs(): array {
    return [];
  }

  public function hasParagraph(string $paragraph_type): bool {
    return FALSE;
  }

}
