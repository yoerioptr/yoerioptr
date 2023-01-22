<?php

namespace Drupal\site\Entity\Paragraph;

final class Text extends Paragraph {

  public function getDescriptiveText(): string {
    return $this->get('field_text_formatted_long')->value;
  }

}
