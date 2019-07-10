<?php

namespace Drupal\cnd_layouts\Plugin\Layout;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Layout\LayoutDefault;
use Drupal\Core\Plugin\PluginFormInterface;
use Drupal\Core\Template\Attribute;
use Drupal\Component\Utility\Html;

class ConfigurableLayout extends LayoutDefault implements PluginFormInterface {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    $config = [];
    $config['section_name'] = NULL;

    return $config;
  }

  /**
   * {@inheritdoc}
   */
  public function build(array $regions) {
    $build = parent::build($regions);
    $build['#data'] = [];
    $build['#wrapper_attributes'] = new Attribute();

    // Populate the data and wrapper attributes
    if (!empty($this->configuration['section_name'])) {
      $build['#data']['section_name'] = $this->configuration['section_name'];
      $build['#wrapper_attributes']->setAttribute
      ('id', 'section-' . Html::getId($this->configuration['section_name']));
      $build['#wrapper_attributes']->setAttribute('class', 'section');
      $build['#wrapper_attributes']->setAttribute('data-section-name', $this->configuration['section_name']);
    }

    return $build;
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form['section_name'] = [
      '#title' => $this->t('Section name'),
      '#type' => 'textfield',
      '#description' => $this->t('Provide an optional name for this section of the page.'),
      '#default_value' => (!empty($this->configuration['section_name']) ? $this->configuration['section_name'] : ''),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  /**
   * {@inheritdoc}
   */
  public function validateConfigurationForm(array &$form, FormStateInterface $form_state) { }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    $this->configuration['section_name'] = $form_state->getValue('section_name');
  }
}
