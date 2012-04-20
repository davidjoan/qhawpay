<?php

/**
 * Stringkit
 *
 * @package    flexiwik
 * @subpackage util
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 */
class Stringkit extends sfStringkitExt
{
  protected static
    $reUrlAccess = "/[^a-z0-9\-_\\/(\)\[\]'çàáâãäåāæèéêëėēęìíîïīįòóôõōöøœùúûüůũūųýÿŷñ:]+/",
    $reTitle     = "/[^a-zA-Z0-9\-_\(\)\[\]'çàáâãäåāæèéêëėēęìíîïīįòóôõōöøœùúûüůũūųýÿŷñ ÇÀÁÂÃÄÅĀÆÈÉÊËĖĒĘÌÍÎÏĪĮÒÓÔÕŌÖØŒÙÚÛÜŮŨŪŲÝŸŶÑ]+/";
}
