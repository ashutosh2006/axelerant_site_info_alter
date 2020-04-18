<?php

namespace Drupal\site_info_alter\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\system\Form\SiteInformationForm;

/**
 * Class SiteInfoAlterSiteInformationForm.
 */
class SiteInfoAlterSiteInformationForm extends SiteInformationForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    //Load SiteInformation config
    $config = $this->config('system.site');

    //Load SiteInformation Form
    $form = parent::buildForm($form, $form_state);

    $form['site_information']['siteapikey'] = [
      '#type' => 'textfield',
      '#title' => t('Site API Key'),
      '#default_value' => !empty($config->get('siteapikey')) ? $config->get('siteapikey') : "No API Key yet",
    ];

    $form['actions']['submit']['#value'] = t('Update Configuration');

    return $form;

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // saving siteapikey
    $this->config('system.site')
      ->set('siteapikey', $form_state->getValue('siteapikey'))
      ->save();
    //callback parent form
    parent::submitForm($form, $form_state);
  }
}
