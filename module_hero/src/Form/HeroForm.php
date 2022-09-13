<?php

namespace Drupal\module_hero\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class for custom Hero form.
 */
class HeroForm extends FormBase {

  /**
   * Function to get form id.
   */
  public function getFormId() {
    return 'module_hero_heroform';
  }

  /**
   * {@inheritDoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['rival_1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Rival one:'),
    ];

    $form['rival_2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Rival two:'),
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Who will win?'),
    ];
    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $winner = rand(1, 2);
    \Drupal::messenger()->addStatus('The winner is: ' . $form_state->getValue('rival_' . $winner));
  }

  /**
   * {@inheritDoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (empty($form_state->getValue('rival_1'))) {
      $form_state->setErrorByName('rival_1', $this->t('Please specify rival one.'));
    }

    if (empty($form_state->getValue('rival_2'))) {
      $form_state->setErrorByName('rival_2', $this->t('Please specify rival two.'));
    }
  }

}
