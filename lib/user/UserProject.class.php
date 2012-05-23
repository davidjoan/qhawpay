<?php

/**
 * UserProject
 *
 * @package    flexiwik
 * @subpackage user
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 */
class UserProject extends sfUserExt
{
  /**
   * Updates the last access field from the db user.
   * 
   * @see sfUserExt
   */
  public function updateUserLastAccess()
  {
    $customer = Doctrine::getTable('Customer')->find($this->getUserId());
    if ($customer)
    {
      // not using the date formatter because this method can be called before the formatter exists
      $customer->setLastAccessAt(date('Y-m-d H:i:s'));
      $customer->save();
    }
  }
  
  /**
   * Log in the user.
   * 
   * @param User $user The user that logs in.
   */
  public function login(Customer $customer)
  {
    //Deb::print_r_pre('aaaa');
    echo ' ';
    $this->setAttribute('user_id' , $customer->getId()      , ActionsProject::CUSTOMER_NAMESPACE);
    $this->setAttribute('username', $customer->getUsername(), ActionsProject::CUSTOMER_NAMESPACE);
    $this->setAttribute('email'   , $customer->getEmail()   , ActionsProject::CUSTOMER_NAMESPACE);
    $this->setAttribute('slug'    , $customer->getSlug()    , ActionsProject::CUSTOMER_NAMESPACE);
    $this->setAuthenticated(true);
  }
  /**
   * Log out the user.
   * 
   * @param User $user The user that logs out.
   */
  public function logout()
  {
    $this->setAuthenticated(false);
  }
  
  public function getUserId($default = null)
  {
    return $this->getAttribute('user_id' , $default, ActionsProject::CUSTOMER_NAMESPACE);
  }
  public function getUsername($default = null)
  {
    return $this->getAttribute('username', $default, ActionsProject::CUSTOMER_NAMESPACE);
  }
  public function getUserEmail($default = null)
  {
    return $this->getAttribute('email'   , $default, ActionsProject::CUSTOMER_NAMESPACE);
  }
  public function getUserSlug($default = null)
  {
    return $this->getAttribute('slug'    , $default, ActionsProject::CUSTOMER_NAMESPACE);
  }
  
  public function isFirstRequest($boolean = null)
  {
    if (null === $boolean)
    {
      return $this->getAttribute('first_request', true);
    }
   
    $this->setAttribute('first_request', $boolean);
  }
}
