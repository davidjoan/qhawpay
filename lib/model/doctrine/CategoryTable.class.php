<?php

/**
 * CategoryTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CategoryTable extends DoctrineTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object CategoryTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Category');
    }
    
  const
    STATUS_ACTIVE       = 1,
    STATUS_INACTIVE     = 0;
    
  protected static
    $status                = array
                             (
                               self::STATUS_ACTIVE     => 'Si'  ,
                               self::STATUS_INACTIVE   => 'No',
                             );

  public function getStatuss()
  {
    return self::$status;
  }
  
  public function getPathDir()
  {
    return sfConfig::get('app_category_images_dir');
  }
  
  public function getImagePath()
  {
    return sfConfig::get('app_category_images_path');
  }
}