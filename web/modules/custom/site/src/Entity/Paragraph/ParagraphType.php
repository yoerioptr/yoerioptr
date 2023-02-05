<?php

namespace Drupal\site\Entity\Paragraph;

enum ParagraphType: string {

  case CONTRIBUTIONS = 'contributions';
  case PORTRAIT_HEADER = 'portrait_header';
  case TEXT = 'text';

  public function listCacheTag(): string {
    return "paragraph_list:$this->value";
  }

}
