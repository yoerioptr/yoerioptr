<?php

namespace Drupal\site\Entity\Node;

enum Bundle: string {

  case BASIC_PAGE = 'basic_page';
  case PROJECT = 'project';

  public function listCacheTag(): string {
    return "node_list:$this->value";
  }

}
