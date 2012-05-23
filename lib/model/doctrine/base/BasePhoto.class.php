<?php

/**
 * BasePhoto
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $store_id
 * @property string $name
 * @property string $path
 * @property integer $size
 * @property string $full_mime
 * @property integer $rank
 * @property Store $Store
 * 
 * @method integer getId()        Returns the current record's "id" value
 * @method integer getStoreId()   Returns the current record's "store_id" value
 * @method string  getName()      Returns the current record's "name" value
 * @method string  getPath()      Returns the current record's "path" value
 * @method integer getSize()      Returns the current record's "size" value
 * @method string  getFullMime()  Returns the current record's "full_mime" value
 * @method integer getRank()      Returns the current record's "rank" value
 * @method Store   getStore()     Returns the current record's "Store" value
 * @method Photo   setId()        Sets the current record's "id" value
 * @method Photo   setStoreId()   Sets the current record's "store_id" value
 * @method Photo   setName()      Sets the current record's "name" value
 * @method Photo   setPath()      Sets the current record's "path" value
 * @method Photo   setSize()      Sets the current record's "size" value
 * @method Photo   setFullMime()  Sets the current record's "full_mime" value
 * @method Photo   setRank()      Sets the current record's "rank" value
 * @method Photo   setStore()     Sets the current record's "Store" value
 * 
 * @package    qhawpay
 * @subpackage model
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePhoto extends DoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('t_photo');
        $this->hasColumn('id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('store_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             'notnull' => true,
             ));
        $this->hasColumn('name', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             'notnull' => true,
             ));
        $this->hasColumn('path', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'notnull' => true,
             ));
        $this->hasColumn('size', 'integer', 10, array(
             'type' => 'integer',
             'length' => 10,
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('full_mime', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             'notnull' => true,
             ));
        $this->hasColumn('rank', 'integer', 5, array(
             'type' => 'integer',
             'length' => 5,
             'notnull' => true,
             'default' => 0,
             ));


        $this->index('i_name', array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $this->option('symfony', array(
             'filter' => false,
             'form' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Store', array(
             'local' => 'store_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT',
             'onUpdate' => 'CASCADE'));

        $sluggableext0 = new Doctrine_Template_SluggableExt(array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $timestampable0 = new Doctrine_Template_Timestampable();
        $thumbnailable0 = new Doctrine_Template_Thumbnailable();
        $softdelete0 = new Doctrine_Template_SoftDelete();
        $this->actAs($sluggableext0);
        $this->actAs($timestampable0);
        $this->actAs($thumbnailable0);
        $this->actAs($softdelete0);
    }
}