<?php

/**
 * DynamicContainerForm
 *
 * @package    symfext
 * @subpackage form
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 */
class DynamicContainerForm extends BaseForm
{
  public function getFormJavascripts()
  {
    return array('/js/general/sfDynamicFormEmbedder.js');
  }
}
