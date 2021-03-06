<?php

/**
 * DoctrineTable
 *
 * @package    flexiwik
 * @subpackage doctrine
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 */
class DoctrineTable extends sfDoctrineTableExt
{
  public function findNextCode()
  {
    $q = $this->createAliasQuery()
         ->orderBy($this->getAlias().'.id DESC');
    
    $object = $q->fetchOne();
    $code   = $object ? substr($object->getCode(), -8) + 1 : 1000;
    
    return str_pad($code, 8, '0', STR_PAD_LEFT);
  }
}
