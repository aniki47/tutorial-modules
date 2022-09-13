<?php

namespace Drupal\module_hero\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\module_hero\HeroArticleService;
use Drupal\Core\Config\ConfigFactory;

/**
 * This is our hero controller.
 */
class HeroController extends ControllerBase {

  private $articleHeroService;
  protected $configFactory;
  protected $currentUser;

  /**
   *
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('module_hero.hero_articles'),
      $container->get('config.factory'),
      $container->get('current_user')
    );
  }

  /**
   *
   */
  public function __construct(HeroArticleService $articleHeroService, ConfigFactory $configFactory, $currentUser) {
    $this->articleHeroService = $articleHeroService;
    $this->configFactory = $configFactory;
    $this->currentUser = $currentUser;
  }

  /**
   *
   */
  public function heroList() {

    // kint($this->articleHeroService->getHeroArticles());
    // die();
    // Kint to check if configFactory is pulled correctly.
    // kint($this->configFactory->get('module_hero.settings')->get('hero_list_title'));die();
    $heroes = [
      ['name' => 'Iron Man'],
      ['name' => 'Captain America'],
      ['name' => 'Wonder Woman'],
      ['name' => 'Spiderman'],
      ['name' => 'Deadpool'],
      ['name' => 'Wolverine'],
    ];
    // $ourHeroes = '';
    // foreach ($heroes as $hero) {
    //   $ourHeroes .= '<li>' . $hero['name'] . '</li>';
    // }
    // Check access rights of user.
    if ($this->currentUser->hasPermission('can see hero list')) {
      // code...
      return [
        '#theme' => 'hero_list',
        '#items' => $heroes,
        '#title' => $this->configFactory->get('module_hero.settings')->get('hero_list_title'),
      ];
    }
    else {
      return [
        '#theme' => 'hero_list',
        '#items' => [],
        '#title' => $this->configFactory->get('module_hero.settings')->get('hero_list_title'),
      ];
    }

  }

}
