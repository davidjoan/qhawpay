<?php

/**
 * General components.
 *
 * @package    cusasite
 * @subpackage General
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 */
class GeneralComponents extends ComponentsProject
{
  public function executeLeftBox()
  {
    $this->visits    = Doctrine::getTable('Visit')->count();
    
    $this->lastVisit = Doctrine::getTable('Visit')->findLast();
  }
}
