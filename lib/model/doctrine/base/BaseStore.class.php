<?php

/**
 * BaseStore
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $customer_id
 * @property string $ruc
 * @property string $name
 * @property string $logo
 * @property string $url
 * @property string $phrase
 * @property string $info
 * @property string $description
 * @property timestamp $datetime
 * @property integer $qty_votes
 * @property string $status
 * @property Customer $Customer
 * @property Doctrine_Collection $Addresses
 * @property Doctrine_Collection $Offers
 * @property Doctrine_Collection $Photos
 * @property Doctrine_Collection $Categories
 * @property Doctrine_Collection $Services
 * @property Doctrine_Collection $Tags
 * @property Doctrine_Collection $StoreCategory
 * @property Doctrine_Collection $StoreService
 * @property Doctrine_Collection $StoreTag
 * 
 * @method integer             getId()            Returns the current record's "id" value
 * @method integer             getCustomerId()    Returns the current record's "customer_id" value
 * @method string              getRuc()           Returns the current record's "ruc" value
 * @method string              getName()          Returns the current record's "name" value
 * @method string              getLogo()          Returns the current record's "logo" value
 * @method string              getUrl()           Returns the current record's "url" value
 * @method string              getPhrase()        Returns the current record's "phrase" value
 * @method string              getInfo()          Returns the current record's "info" value
 * @method string              getDescription()   Returns the current record's "description" value
 * @method timestamp           getDatetime()      Returns the current record's "datetime" value
 * @method integer             getQtyVotes()      Returns the current record's "qty_votes" value
 * @method string              getStatus()        Returns the current record's "status" value
 * @method Customer            getCustomer()      Returns the current record's "Customer" value
 * @method Doctrine_Collection getAddresses()     Returns the current record's "Addresses" collection
 * @method Doctrine_Collection getOffers()        Returns the current record's "Offers" collection
 * @method Doctrine_Collection getPhotos()        Returns the current record's "Photos" collection
 * @method Doctrine_Collection getCategories()    Returns the current record's "Categories" collection
 * @method Doctrine_Collection getServices()      Returns the current record's "Services" collection
 * @method Doctrine_Collection getTags()          Returns the current record's "Tags" collection
 * @method Doctrine_Collection getStoreCategory() Returns the current record's "StoreCategory" collection
 * @method Doctrine_Collection getStoreService()  Returns the current record's "StoreService" collection
 * @method Doctrine_Collection getStoreTag()      Returns the current record's "StoreTag" collection
 * @method Store               setId()            Sets the current record's "id" value
 * @method Store               setCustomerId()    Sets the current record's "customer_id" value
 * @method Store               setRuc()           Sets the current record's "ruc" value
 * @method Store               setName()          Sets the current record's "name" value
 * @method Store               setLogo()          Sets the current record's "logo" value
 * @method Store               setUrl()           Sets the current record's "url" value
 * @method Store               setPhrase()        Sets the current record's "phrase" value
 * @method Store               setInfo()          Sets the current record's "info" value
 * @method Store               setDescription()   Sets the current record's "description" value
 * @method Store               setDatetime()      Sets the current record's "datetime" value
 * @method Store               setQtyVotes()      Sets the current record's "qty_votes" value
 * @method Store               setStatus()        Sets the current record's "status" value
 * @method Store               setCustomer()      Sets the current record's "Customer" value
 * @method Store               setAddresses()     Sets the current record's "Addresses" collection
 * @method Store               setOffers()        Sets the current record's "Offers" collection
 * @method Store               setPhotos()        Sets the current record's "Photos" collection
 * @method Store               setCategories()    Sets the current record's "Categories" collection
 * @method Store               setServices()      Sets the current record's "Services" collection
 * @method Store               setTags()          Sets the current record's "Tags" collection
 * @method Store               setStoreCategory() Sets the current record's "StoreCategory" collection
 * @method Store               setStoreService()  Sets the current record's "StoreService" collection
 * @method Store               setStoreTag()      Sets the current record's "StoreTag" collection
 * 
 * @package    qhawpay
 * @subpackage model
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseStore extends DoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('t_store');
        $this->hasColumn('id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('customer_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             'notnull' => true,
             ));
        $this->hasColumn('ruc', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             'notnull' => false,
             ));
        $this->hasColumn('name', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             'notnull' => true,
             ));
        $this->hasColumn('logo', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             'notnull' => false,
             ));
        $this->hasColumn('url', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             'notnull' => false,
             ));
        $this->hasColumn('phrase', 'string', 450, array(
             'type' => 'string',
             'length' => 450,
             'notnull' => false,
             ));
        $this->hasColumn('info', 'string', 500, array(
             'type' => 'string',
             'length' => 500,
             'notnull' => false,
             ));
        $this->hasColumn('description', 'string', 2000, array(
             'type' => 'string',
             'length' => 2000,
             'notnull' => false,
             ));
        $this->hasColumn('datetime', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('qty_votes', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             'notnull' => false,
             ));
        $this->hasColumn('status', 'string', 2, array(
             'type' => 'string',
             'length' => 2,
             'fixed' => 1,
             'notnull' => true,
             'default' => 'PE',
             ));


        $this->index('u_ruc', array(
             'fields' => 
             array(
              0 => 'ruc',
             ),
             'type' => 'unique',
             ));
        $this->index('u_name', array(
             'fields' => 
             array(
              0 => 'name',
             ),
             'type' => 'unique',
             ));
        $this->index('i_ruc', array(
             'fields' => 
             array(
              0 => 'status',
             ),
             ));
        $this->index('i_phrase', array(
             'fields' => 
             array(
              'phrase' => 
              array(
              'length' => 400,
              ),
             ),
             ));
        $this->index('i_info', array(
             'fields' => 
             array(
              'info' => 
              array(
              'length' => 100,
              ),
             ),
             ));
        $this->index('i_datetime', array(
             'fields' => 
             array(
              0 => 'datetime',
             ),
             ));
        $this->index('i_status', array(
             'fields' => 
             array(
              0 => 'status',
             ),
             ));
        $this->option('symfony', array(
             'filter' => false,
             'form' => true,
             ));
        $this->option('type_columns', array(
             0 => 'status',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Customer', array(
             'local' => 'customer_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT',
             'onUpdate' => 'CASCADE'));

        $this->hasMany('Address as Addresses', array(
             'local' => 'id',
             'foreign' => 'store_id'));

        $this->hasMany('Offer as Offers', array(
             'local' => 'id',
             'foreign' => 'store_id'));

        $this->hasMany('Photo as Photos', array(
             'local' => 'id',
             'foreign' => 'store_id'));

        $this->hasMany('Category as Categories', array(
             'refClass' => 'StoreCategory',
             'local' => 'store_id',
             'foreign' => 'category_id'));

        $this->hasMany('Service as Services', array(
             'refClass' => 'StoreService',
             'local' => 'store_id',
             'foreign' => 'service_id'));

        $this->hasMany('Tag as Tags', array(
             'refClass' => 'StoreTag',
             'local' => 'store_id',
             'foreign' => 'tag_id'));

        $this->hasMany('StoreCategory', array(
             'local' => 'id',
             'foreign' => 'store_id'));

        $this->hasMany('StoreService', array(
             'local' => 'id',
             'foreign' => 'store_id'));

        $this->hasMany('StoreTag', array(
             'local' => 'id',
             'foreign' => 'store_id'));

        $sluggableext0 = new Doctrine_Template_SluggableExt(array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $timestampable0 = new Doctrine_Template_Timestampable();
        $softdelete0 = new Doctrine_Template_SoftDelete();
        $this->actAs($sluggableext0);
        $this->actAs($timestampable0);
        $this->actAs($softdelete0);
    }
}