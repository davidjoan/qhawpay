<?php

/**
 * BaseStoreCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $store_id
 * @property integer $category_id
 * @property Store $Store
 * @property Category $Category
 * 
 * @method integer       getStoreId()     Returns the current record's "store_id" value
 * @method integer       getCategoryId()  Returns the current record's "category_id" value
 * @method Store         getStore()       Returns the current record's "Store" value
 * @method Category      getCategory()    Returns the current record's "Category" value
 * @method StoreCategory setStoreId()     Sets the current record's "store_id" value
 * @method StoreCategory setCategoryId()  Sets the current record's "category_id" value
 * @method StoreCategory setStore()       Sets the current record's "Store" value
 * @method StoreCategory setCategory()    Sets the current record's "Category" value
 * 
 * @package    qhawpay
 * @subpackage model
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseStoreCategory extends DoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('t_store_category');
        $this->hasColumn('store_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             'primary' => true,
             ));
        $this->hasColumn('category_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             'primary' => true,
             ));

        $this->option('symfony', array(
             'filter' => false,
             'form' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Store', array(
             'local' => 'store_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('Category', array(
             'local' => 'category_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             'updated' => 
             array(
              'disabled' => true,
             ),
             ));
        $this->actAs($timestampable0);
    }
}