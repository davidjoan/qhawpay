<?php

/**
 * GoogleAccount filter form base class.
 *
 * @package    qhawpay
 * @subpackage filter
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGoogleAccountFormFilter extends PluginGoogleAccountFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('google_account_filters[%s]');
  }

  public function getModelName()
  {
    return 'GoogleAccount';
  }
}
