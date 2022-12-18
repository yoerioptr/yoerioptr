<?php

namespace Drupal\site\Entity\Media;

enum MediaType: string {

  case IMAGE = 'image';
  case REMOTE_VIDEO = 'remote_video';

  public function listCacheTag(): string {
    return "media_list:$this->value";
  }

}
