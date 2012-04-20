<?php

/**
 * Doctrine_Template_NestedSetExt
 *
 * @package    symfext
 * @subpackage template
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 */
class Doctrine_Template_NestedSetExt extends Doctrine_Template_NestedSet
{
  /**
   * @see Doctrine_Template_NestedSet
   */
  public function setUp()
  {
    parent::setUp();
    $this->_table->setOption('treeImpl', 'NestedSetExt');
  }
}
