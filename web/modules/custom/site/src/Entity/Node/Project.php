<?php

namespace Drupal\site\Entity\Node;

use Drupal\site\Entity\DetailPageContainingEntityInterface;
use Drupal\site\Entity\DetailPageContainingEntityTrait;
use Drupal\site\Entity\ParagraphContainingEntityInterface;
use Drupal\site\Entity\ParagraphContainingEntityTrait;

final class Project extends Node implements
  DetailPageContainingEntityInterface,
  ParagraphContainingEntityInterface {

  use DetailPageContainingEntityTrait,
    ParagraphContainingEntityTrait;
}
