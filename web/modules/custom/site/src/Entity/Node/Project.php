<?php

namespace Drupal\site\Entity\Node;

final class Project extends Node {

  public function getActiveYears(): array {
    $start_date = $this->get('field_date_start');
    $end_date = $this->get('field_date_end');

    dpm($start_date); dpm($end_date);
    return [];
  }

}
