<?php

namespace Drupal\site\EventSubscriber;

use Drupal\core_event_dispatcher\EntityHookEvents;
use Drupal\core_event_dispatcher\Event\Entity\EntityBundleInfoAlterEvent;
use Drupal\site\Entity\Media\Image;
use Drupal\site\Entity\Media\MediaType;
use Drupal\site\Entity\Media\RemoteVideo;
use Drupal\site\Entity\Media\SvgImage;
use Drupal\site\Entity\Node\BasicPage;
use Drupal\site\Entity\Node\Bundle;
use Drupal\site\Entity\Node\Project;
use Drupal\site\Entity\Paragraph\PortraitHeader;
use Drupal\site\Entity\Paragraph\ParagraphType;
use Drupal\site\Entity\Paragraph\Text;
use Drupal\site\Entity\Term\Company;
use Drupal\site\Entity\Term\Technology;
use Drupal\site\Entity\Term\Vocabulary;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final class OverrideEntityClasses implements EventSubscriberInterface {

  public function overrideMediaBundleClasses(
    EntityBundleInfoAlterEvent $event
  ): void {
    $bundles = &$event->getBundles()['media'];
    $bundles[MediaType::IMAGE->value]['class'] = Image::class;
    $bundles[MediaType::REMOTE_VIDEO->value]['class'] = RemoteVideo::class;
    $bundles[MediaType::SVG_IMAGE->value]['class'] = SvgImage::class;
  }

  public function overrideNodeBundleClasses(
    EntityBundleInfoAlterEvent $event
  ): void {
    $bundles = &$event->getBundles()['node'];
    $bundles[Bundle::BASIC_PAGE->value]['class'] = BasicPage::class;
    $bundles[Bundle::PROJECT->value]['class'] = Project::class;
  }

  public function overrideParagraphBundleClasses(
    EntityBundleInfoAlterEvent $event
  ): void {
    $bundles = &$event->getBundles()['paragraphs'];
    $bundles[ParagraphType::PORTRAIT_HEADER->value]['class'] = PortraitHeader::class;
    $bundles[ParagraphType::TEXT->value]['class'] = Text::class;
  }

  public function overrideTaxonomyTermBundleClasses(
    EntityBundleInfoAlterEvent $event
  ): void {
    $bundles = &$event->getBundles()['taxonomy_term'];
    $bundles[Vocabulary::COMPANY->value]['class'] = Company::class;
    $bundles[Vocabulary::TECHNOLOGY->value]['class'] = Technology::class;
  }

  public static function getSubscribedEvents(): array {
    $events[EntityHookEvents::ENTITY_BUNDLE_INFO_ALTER] = [
      ['overrideMediaBundleClasses'],
      ['overrideNodeBundleClasses'],
      ['overrideParagraphBundleClasses'],
      ['overrideTaxonomyTermBundleClasses'],
    ];

    return $events;
  }

}
