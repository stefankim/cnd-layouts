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
    //$config['section_name'] = null;
    //$config['text_style_list'] = null;
    //$config['background_image'] = null;
    //$config['background_colour'] = null;
    $config['style'] = null;

    return $config;
  }

  /**
   * {@inheritdoc}
   */
  public function build(array $regions) {
    $build = parent::build($regions);
    $build['#data'] = [];
    $build['#wrapper_attributes'] = new Attribute();

    // Retrieve the style settings
    //$bg_image = null;
    //$bg_color = null;

    //if (!empty($this->configuration['background_image'])) {
      /** @var \Drupal\media\Entity\Media $media */
      //$media = \Drupal::entityTypeManager()->getStorage('media')->load($this->configuration['background_image']);

      //if ($media && $media->bundle() == 'image') {
        //$bg_image = file_create_url($media->field_media_image->first()->entity->getFileUri());
      //}
    //}

    //if (!empty($this->configuration['background_colour'])) {
      //$bg_color = $this->_getBackgroundColour($this->configuration['background_colour']);
    //}

    // Populate the data and wrapper attributes
    if (!empty($this->configuration['section_name'])) {
      $build['#data']['section_name'] = $this->configuration['section_name'];
      $build['#wrapper_attributes']->setAttribute('id', 'section-' . Html::getId($this->configuration['section_name']));
      $build['#wrapper_attributes']->setAttribute('class', 'section');
      $build['#wrapper_attributes']->setAttribute('data-section-name', $this->configuration['section_name']);
    }

    //if (!empty($this->configuration['text_style_list'])) {
      //$build['#data']['text_style_list'] = $this->configuration['text_style_list'];
    //}

    if (!empty($style) || !empty($bg_color)) {
      $styles = [];

      //if (!empty($bg_color)) {
        //$styles[] = "background-color: " . $bg_color . ";";
      //}

      //if (!empty($bg_image)) {
        //$styles[] = "background-image: url('" . $bg_image . "');";
      //}

      $build['#wrapper_attributes']->setAttribute('style', implode($styles));
      $build['#wrapper_attributes']->addClass('layout__wrapper--background');
    }

    return $build;
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    //$form['section_name'] = [
      //'#title' => $this->t('Section name'),
      //'#type' => 'textfield',
      //'#description' => $this->t('Provide an optional name for this section of the page. This name will also be used within the Jump To navigation.'),
      //'#default_value' => (!empty($this->configuration['section_name']) ? $this->configuration['section_name'] : ''),
    //];

    //$form['text_style_list'] = [
      //'#title' => $this->t('Text style'),
      //'#type' => 'select',
      //'#options' => [
        //'dark' => 'Dark',
        //'light' => 'Light',
      //],
      //'#default_value' => (!empty($this->configuration['text_style_list']) ? $this->configuration['text_style_list'] : ''),
    //];

    //$form['background_image'] = [
      //'#title' => $this->t('Background image'),
      //'#type' => 'entity_autocomplete',
      //'#description' => $this->t('Autocomplete field to find an existing background media image.'),
      //'#target_type' => 'media',
      //'#selection_handler' => 'default',
      //'#selection_settings' => [
        //'target_bundles' => ['image'],
      //],
    //];

    //if (!empty($this->configuration['background_image'])) {
      //$form['background_image']['#default_value'] = \Drupal::entityTypeManager()->getStorage('media')->load($this->configuration['background_image']);
    //}

    //$colours = [];
    //$colour_terms = \Drupal::entityManager()->getStorage('taxonomy_term')->loadTree('cnd_colour');
    //foreach ($colour_terms as $term) {
      //$colours[$term->tid] = $term->name;
    //}

    //$form['background_colour'] = [
      //'#title' => $this->t('Background colour'),
      //'#type' => 'select',
      //'#empty_option' => 'Select colour',
      //'#options' => $colours
    //];

    //if (!empty($this->configuration['background_colour'])) {
      //$form['background_colour']['#default_value'] = $this->configuration['background_colour'];
    //}

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateConfigurationForm(array &$form, FormStateInterface $form_state) {

  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    //$this->configuration['section_name'] = $form_state->getValue('section_name');
    //$this->configuration['text_style_list'] = $form_state->getValue('text_style_list');
    //$this->configuration['background_image'] = $form_state->getValue('background_image');
    //$this->configuration['background_colour'] = $form_state->getValue('background_colour');
    $this->configuration['style'] = $form_state->getValue('style');
  }

  /**
   * Helper function to get field_colour from a colour vocab term.
   */
  //private function _getBackgroundColour($tid) {
    //$colour = '';

    //$term = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($tid);
    //if ($term) {
      //$colour = $term->get('field_colour')->color;
      //$opacity = $term->get('field_colour')->opacity;

      //$color_rgb = new ColorHex($colour, $opacity);
      //$rgb_text = $color_rgb->toRGB()->toString(TRUE);
    //}

    //return $rgb_text;
  //}

}
