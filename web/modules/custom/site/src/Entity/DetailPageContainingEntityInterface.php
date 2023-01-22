<?php

namespace Drupal\site\Entity;

use Drupal\media\MediaInterface;

interface DetailPageContainingEntityInterface {

  public function getTeaserTitle(): string;

  public function getTeaserDescription(): string;

  public function getTeaserImage(): ?MediaInterface;

  public function getMetaTitle(): string;

  public function getMetaDescription(): string;

  public function getMetaImage(): ?MediaInterface;

}
