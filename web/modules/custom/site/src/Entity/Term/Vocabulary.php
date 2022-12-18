<?php

namespace Drupal\site\Entity\Term;

enum Vocabulary: string {

  case COMPANY = 'company';
  case TECHNOLOGY = 'technology';

  public function listCacheTag(): string {
    return "taxonomy_term_list:$this->value";
  }

}
