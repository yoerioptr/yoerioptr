<?php

namespace Drupal\site\EventSubscriber;

use Drupal\Core\Extension\ModuleExtensionList;
use Drupal\Core\Extension\ThemeExtensionList;
use Drupal\core_event_dispatcher\Event\Theme\ThemeEvent;
use Drupal\core_event_dispatcher\ThemeHookEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final class DefineCustomThemes implements EventSubscriberInterface {

  private string $modulePath;

  public function __construct(ModuleExtensionList $moduleExtensionList) {
    $this->modulePath = $moduleExtensionList->getPath('site');
  }

  public function defineThemes(ThemeEvent $event): void {
    $event->addNewTheme('branding', [
      'path' => "$this->modulePath/templates",
      'variables' => [
        'config' => NULL,
      ],
    ]);
  }

  public static function getSubscribedEvents(): array {
    $events[ThemeHookEvents::THEME][] = ['defineThemes'];

    return $events;
  }

}
