<?php
/**
 * Allow to override propel operation for melody specific usage
 *
 * @author Maxime Picaud
 * @since 29 août 2010
 */
class sfMelodyDoctrineOrmAdapter extends sfMelodyOrmAdapter
{
  public function findByMelody($melody)
  {
    $this->checkModels('sfGuardUser', 'findByMelody');

    $user_factory = $melody->getUserFactory();
    $config = $user_factory->getConfig();
    $user = $user_factory->getUser();
    $keys = $user_factory->getKeys();

    if (count($keys) > 0)
    {
      $q = Doctrine::getTable('sfGuardUser')
           ->createQuery('u')
           ->limit(1);
  
      foreach($keys as $key)
      {
        $method = 'get'.sfInflector::classify($key);
        if(is_callable(array($user, $method)))
        {
          $q->addWhere('u.'.$key.' = ?', $user->$method());
        }
      }
  
      return $q->fetchOne();
    }
    
    return false;
  }
}