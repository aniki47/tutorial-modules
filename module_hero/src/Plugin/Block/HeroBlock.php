<?php

namespace Drupal\module_hero\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a block called "Example Hero Block".
 *
 * @Block(
 * id = "hero_block",
 * admin_label = @Translation("Example hero block")
 * )
 */
class HeroBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $heroes = [
      ['hero_name' => 'Iron Man', 'real_name' => 'Test Value'],
      ['hero_name' => 'Captain America', 'real_name' => 'Test Value'],
      ['hero_name' => 'Wonder Woman', 'real_name' => 'Test Value'],
      ['hero_name' => 'Spiderman', 'real_name' => 'Test Value'],
      ['hero_name' => 'Deadpool', 'real_name' => 'Test Value'],
      ['hero_name' => 'Wolverine', 'real_name' => 'Test Value'],
    ];

    $table = [
      '#type' => 'table',
      '#header' => [
        $this->t('Hero Name'),
        $this->t('Real Name'),
      ],
    ];

    foreach ($heroes as $hero) {
      $table[] = [
        'hero_name' => [
          '#type' => 'markup',
          '#markup' => $hero['hero_name'],
        ],
        'real_name' => [
          '#type' => 'markup',
          '#markup' => $hero['real_name'],
        ],
      ];
    }

    return $table;
  }

}
