<?php

/**
 * Service actions.
 *
 * @package    qhawpay
 * @subpackage Service
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ServiceActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
}
