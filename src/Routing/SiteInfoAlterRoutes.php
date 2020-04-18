<?php

namespace Drupal\site_info_alter\Routing;

use Symfony\Component\Routing\RouteCollection;
use Drupal\Core\Routing\RouteSubscriberBase;

/**
 * Defines a route subscriber to register new url for serving site information page.
 */
class SiteInfoAlterRoutes extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection)
  {
    // Changing form for the system.site_information_settings
    if($route = $collection->get('system.site_information_settings'))
    {
      // Next, we need to set the value for _form to the form we have created.
      $route->setDefault('_form', 'Drupal\site_info_alter\Form\SiteInfoAlterSiteInformationForm');
    }
  }
}
