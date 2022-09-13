<?php

namespace Drupal\route_alter\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Class that listens to dynamic route events and enables us to alter them.
 */
class CustomRouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    // Alter paths for core routes.
    $user_login_route = $collection->get('user.login');
    $user_login_route->setPath('/custom/login');

    $user_route = $collection->get('user.page');
    $user_route->setPath('/custom');
  }

}
