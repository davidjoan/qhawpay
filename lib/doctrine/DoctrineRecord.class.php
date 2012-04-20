<?php

/**
 * DoctrineRecord
 *
 * @package    flexiwik
 * @subpackage doctrine
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 */
abstract class DoctrineRecord extends sfDoctrineRecordExt
{
  public function loadNextCode()
  {
    if (!$this->getCode())
    {
      $this->setCode($this->getTable()->findNextCode());
    }
  }
}
