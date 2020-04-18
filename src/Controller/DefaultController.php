<?php

namespace Drupal\site_info_alter\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;
use Zend\Diactoros\Response\JsonResponse;

/**
 * Class DefaultController.
 */
class DefaultController extends ControllerBase {
  /**
   * Pagejson.
   *
   * @return string
   *   Return JSON response.
   */
  public function PageJSON($api_key, NodeInterface $node) {
    //Load site configuration to check APIKey
    $config = \Drupal::config("system.site");
    try{
      //Validating API-Key and Node type
      if ($config->get("siteapikey") != $api_key || $node->getType() != "page") {
        //retruning access denied if both the parameters are not acceptable
        return new JsonResponse([ "message" => "access denied"], "404");
      }
    }catch (\Exception $ex) {
      //returning error message in-case any exception in access
      return new JsonResponse($ex->getMessage());
    }
    //Return Node title, body and success message.
    return new JsonResponse(['title' => $node->getTitle(), 'body' => $node->body->getValue(), 'message' => 'success']);
  }
}
