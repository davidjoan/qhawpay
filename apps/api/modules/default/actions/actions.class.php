<?php

/**
 * default actions.
 *
 * @package    qhawpay
 * @subpackage default
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class defaultActions extends ActionsProject
{
  /**
   * Module disabled in settings.yml
   */
  public function executeDisabled()
  {
  }
  /**
   * Error page for page not found (404) error
   */
  public function executeError404()
  {
  }
  /**
   * Warning page for restricted area - requires credentials
   */
  public function executeLogin()
  {
  }
  /**
   * Warning page for restricted area - requires login
   */
  public function executeSecure()
  {
  }
}
