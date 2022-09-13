<?php

namespace Drupal\module_hero;

use Drupal\Core\Entity\Query\QueryFactory;
use Drupal\Core\Entity\EntityManager;

/**
 * Our Hero Article Service Class.
 */
class HeroArticleService {

  private $entityQuery;
  private $entityManager;

  /**
   * Constructor function.
   */
  public function __construct(QueryFactory $entityQuery, EntityManager $entityManager) {
    $this->entityQuery = $entityQuery;
    $this->entityManager = $entityManager;
  }

  /**
   * Method for getting articles, regarding heroes.
   */
  public function getHeroArticles() {
    // $articles = ['Hulk is green!', 'Flas is red!'];
    $articleNids = $this->entityQuery->get('node')->condition('type', 'article')->execute();

    $articles = $this->entityManager->getStorage('node')->loadMultiple($articleNids);

    return $articles;
  }

}
