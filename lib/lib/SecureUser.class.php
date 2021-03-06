<?php

/**
 * BaseSecureUser.
 * 
 * @package    flexiwik
 * @subpackage model
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 */
class SecureUser extends BaseUser
{
  public function setPassword($password)
  {
    $this->_set('password', kcCrypt::encrypt($password));
  }
  public function generateEmailToken()
  {
    $this->setEmailToken(kcCrypt::encrypt($this->getEmail()));
  }
  
  public function save(Doctrine_Connection $conn = null)
  {
    if ($this->isNew())
    {
      $this->generateEmailToken();
    }
    
    parent::save($conn);
  }
}
