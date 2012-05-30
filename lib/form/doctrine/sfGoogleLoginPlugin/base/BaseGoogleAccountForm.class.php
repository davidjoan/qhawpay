<?php

/**
 * GoogleAccount form base class.
 *
 * @method GoogleAccount getObject() Returns the current form's model object
 *
 * @package    qhawpay
 * @subpackage form
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGoogleAccountForm extends PluginGoogleAccountForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('google_account[%s]');
  }

  public function getModelName()
  {
    return 'GoogleAccount';
  }

}
