<?php

namespace Drupal\module_hero\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Our event subscriber class.
 */
class HeroInitSubscriber implements EventSubscriberInterface {

  /**
   *
   */
  public function __construct() {
  }

  public function onRequest($event) {
    // Example to config if our event subscriber is working.
    // var_dump('hello from our event');
  }

  /**
   *
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::REQUEST][] = ['onRequest'];
    return $events;
  }

}
