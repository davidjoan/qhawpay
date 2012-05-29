<?php

/**
 * UserFrontend.
 *
 * @package    flexiwik
 * @subpackage lib.user
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 */
class UserFrontend extends UserProject
{
  public function loginFrontend(Patient $user)
  {
    $this->setAttribute('user_id'  , $user->getId()              , ActionsProject::CUSTOMER_NAMESPACE);
    $this->setAttribute('username' , $user->getUsername()        , ActionsProject::CUSTOMER_NAMESPACE);
    $this->setAttribute('realname' , $user->getRealname()        , ActionsProject::CUSTOMER_NAMESPACE);
    $this->setAttribute('email'    , $user->getEmail()           , ActionsProject::CUSTOMER_NAMESPACE);
    $this->setAttribute('slug'     , $user->getSlug()            , ActionsProject::CUSTOMER_NAMESPACE);
    $this->setAttribute('progress' , $user->calculaProgreso()    , ActionsProject::CUSTOMER_NAMESPACE);
    
    $this->setAuthenticated(true);
  }    
  
  public function updateUserLastAccess()
  {
    $user = Doctrine::getTable('Patient')->find($this->getUserId());
    if ($user)
    {
      // not using the date formatter because this method can be called before the formatter exists
      $user->setLastAccessAt(date('Y-m-d H:i:s'));
      $user->save();
    }
  }
  
  public function getUserId($default = null)
  {
    return $this->getAttribute('user_id' , $default, ActionsProject::CUSTOMER_NAMESPACE);
  }
  public function getUsername($default = null)
  {
    return $this->getAttribute('username', $default, ActionsProject::CUSTOMER_NAMESPACE);
  }
  public function getRealname($default = null)
  {
    return $this->getAttribute('realname', $default, ActionsProject::CUSTOMER_NAMESPACE);
  }  
  public function getUserEmail($default = null)
  {
    return $this->getAttribute('email'   , $default, ActionsProject::CUSTOMER_NAMESPACE);
  }
  public function getUserSlug($default = null)
  {
    return $this->getAttribute('slug'    , $default, ActionsProject::CUSTOMER_NAMESPACE);
  }
  public function getProgress($default = null)
  {
    return $this->getAttribute('progress'    , $default, ActionsProject::CUSTOMER_NAMESPACE);
  }     
}
