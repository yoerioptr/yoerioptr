<?php

namespace Drupal\site\Entity;

use Drupal\media\MediaInterface;

trait DetailPageContainingEntityTrait {

  public function getTeaserTitle(): string {
    if ($this->hasField('field_teaser_title')
      && !$this->get('field_teaser_title')->isEmpty()) {
      return $this->get('field_teaser_title')->value;
    }

    return $this->label();
  }

  public function getTeaserDescription(): string {
    if ($this->hasField('field_teaser_description')
      && !$this->get('field_teaser_description')->isEmpty()) {
      return $this->get('field_teaser_description')->value;
    }

    if ($this instanceof ParagraphContainingEntityInterface) {
      foreach ($this->getParagraphs() as $paragraph) {
        if (!empty($paragraph->getDescriptiveText())) {
          return $paragraph->getDescriptiveText();
        }
      }
    }

    return '';
  }

  public function getTeaserImage(): ?MediaInterface {
    if ($this->hasField('field_teaser_image')
      && !$this->get('field_teaser_image')->isEmpty()) {
      return $this->get('field_teaser_image')->entity;
    }

    return NULL;
  }

  public function getMetaTitle(): string {
    if ($this->hasField('field_meta_title')
      && !$this->get('field_meta_title')->isEmpty()) {
      return $this->get('field_meta_title')->value;
    }

    return $this->getTeaserTitle();
  }

  public function getMetaDescription(): string {
    if ($this->hasField('field_meta_description')
      && !$this->get('field_meta_description')->isEmpty()) {
      return $this->get('field_meta_description')->value;
    }

    return $this->getTeaserDescription();
  }

  public function getMetaImage(): ?MediaInterface {
    if ($this->hasField('field_meta_image')
      && !$this->get('field_meta_image')->isEmpty()) {
      return $this->get('field_meta_image')->entity;
    }

    return $this->getTeaserImage();
  }

}
