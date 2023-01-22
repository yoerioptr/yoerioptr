<?php

namespace Drupal\site\Entity\Paragraph;

abstract class Paragraph extends \Drupal\paragraphs\Entity\Paragraph {

  public function getDescriptiveText(): string {
    return '';
  }

}
