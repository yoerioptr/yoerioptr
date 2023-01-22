<?php

namespace Drupal\site\Repository;

use Drupal\node\NodeStorageInterface;

abstract class NodeRepositoryBase {

  public function __construct(
    protected readonly NodeStorageInterface $nodeStorage
  ) {}

}
