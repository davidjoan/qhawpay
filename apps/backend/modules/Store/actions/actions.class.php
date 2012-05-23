<?php

/**
 * Store actions.
 *
 * @package    qhawpay
 * @subpackage Store
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StoreActions extends ActionsCrud
{
  protected function complementList(sfWebRequest $request, DoctrineQuery $q)
  {
    sfDynamicFormEmbedder::resetParams('photo');
    sfDynamicFormEmbedder::resetParams('address');
    
  }
  
  protected function complementSave(sfWebRequest $request)
  {
  $app_id = '20171';
  $key = '4ded5044b87e670d3d50';
  $secret = '40e68b23d3eae75ceac7';
    $pusher = new Pusher($key, $secret, $app_id);
    $data["message"] = sprintf("Una nuevo point a sido registrado");
    $data["id"] = $this->form->getObject()->getId();
    $data["name"] = $this->form->getObject()->getName();
    $pusher->trigger('qhawpay', 'notificaciones',$data );
  }
}