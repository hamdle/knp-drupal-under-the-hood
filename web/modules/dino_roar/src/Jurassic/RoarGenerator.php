<?php

namespace Drupal\dino_roar\Jurassic;

use Drupal\Core\KeyValueStore\KeyValueFactoryInterface;

// A Service
class RoarGenerator
{
  private $keyValueFactory;

  public function __construct(KeyValueFactoryInterface $keyValueFactory)
  {
    $this->keyValueFactory = $keyValueFactory;
  }

  public function getRoar($length)
  {
    $key = 'roar_'.$length;
    $store = $this->keyValueFactory->get('dino');

    if ($store->has($key))
    {
      return $store->get($key);
    }

    sleep(2);

    $string = 'R' . str_repeat('O', $length) . 'AR!';
    $store->set($key, $string);

    return $string;
  }
}