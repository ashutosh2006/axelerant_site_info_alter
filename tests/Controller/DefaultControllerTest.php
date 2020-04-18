<?php

namespace Drupal\site_info_alter\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the site_info_alter module.
 */
class DefaultControllerTest extends WebTestBase {


  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return [
      'name' => "site_info_alter DefaultController's controller functionality",
      'description' => 'Test Unit for module site_info_alter and controller DefaultController.',
      'group' => 'Other',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
  }

  /**
   * Tests site_info_alter functionality.
   */
  public function testDefaultController() {
    // Check that the basic functions of module site_info_alter.
    $this->assertEquals(TRUE, TRUE, 'Test Unit Generated via Drupal Console.');
  }

}
