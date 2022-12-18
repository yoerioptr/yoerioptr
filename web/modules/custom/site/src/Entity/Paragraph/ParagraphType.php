<?php

namespace Drupal\site\Entity\Paragraph;

enum ParagraphType: string {

  case MEDIA_HIGHLIGHTED = 'media_highlighted';
  case TEXT = 'text';

  public function listCacheTag(): string {
    return "paragraph_list:$this->value";
  }

}
