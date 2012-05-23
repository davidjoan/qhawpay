<?php

/**
 * Category
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    qhawpay
 * @subpackage model
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Category extends BaseCategory
{
  public function generatePathFilename($file)
  {
    return Stringkit::fixFilename($file->getOriginalName()).'_'.rand(11111, 99999).$file->getOriginalExtension();
  }    
}
