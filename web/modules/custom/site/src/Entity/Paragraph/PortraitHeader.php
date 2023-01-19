<?php

namespace Drupal\site\Entity\Paragraph;

use Drupal\Component\Render\MarkupInterface;
use Drupal\site\Entity\Media\Image;

final class PortraitHeader extends Paragraph {

  public function getTitle(): string {
    return $this->get('field_title')->value;
  }

  public function getSubtitle(): string {
    return $this->get('field_subtitle')->value;
  }

  public function getPortrait(): ?Image {
    return $this->get('field_media_single')->entity;
  }

  public function getBackgroundImage(): ?Image {
    return $this->get('field_media_single_extra')->entity;
  }

  public function getBody(): MarkupInterface {
    return $this->get('field_text_formatted_long')->processed;
  }

}
