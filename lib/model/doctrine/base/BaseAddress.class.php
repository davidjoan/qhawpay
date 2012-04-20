<?php

/**
 * BaseAddress
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $store_id
 * @property integer $customer_id
 * @property integer $city_id
 * @property string $street
 * @property string $zip_code
 * @property string $phone
 * @property string $fax
 * @property string $mobile
 * @property string $active
 * @property Store $Store
 * @property Customer $Customer
 * @property City $City
 * @property Doctrine_Collection $Offers
 * 
 * @method integer             getId()          Returns the current record's "id" value
 * @method integer             getStoreId()     Returns the current record's "store_id" value
 * @method integer             getCustomerId()  Returns the current record's "customer_id" value
 * @method integer             getCityId()      Returns the current record's "city_id" value
 * @method string              getStreet()      Returns the current record's "street" value
 * @method string              getZipCode()     Returns the current record's "zip_code" value
 * @method string              getPhone()       Returns the current record's "phone" value
 * @method string              getFax()         Returns the current record's "fax" value
 * @method string              getMobile()      Returns the current record's "mobile" value
 * @method string              getActive()      Returns the current record's "active" value
 * @method Store               getStore()       Returns the current record's "Store" value
 * @method Customer            getCustomer()    Returns the current record's "Customer" value
 * @method City                getCity()        Returns the current record's "City" value
 * @method Doctrine_Collection getOffers()      Returns the current record's "Offers" collection
 * @method Address             setId()          Sets the current record's "id" value
 * @method Address             setStoreId()     Sets the current record's "store_id" value
 * @method Address             setCustomerId()  Sets the current record's "customer_id" value
 * @method Address             setCityId()      Sets the current record's "city_id" value
 * @method Address             setStreet()      Sets the current record's "street" value
 * @method Address             setZipCode()     Sets the current record's "zip_code" value
 * @method Address             setPhone()       Sets the current record's "phone" value
 * @method Address             setFax()         Sets the current record's "fax" value
 * @method Address             setMobile()      Sets the current record's "mobile" value
 * @method Address             setActive()      Sets the current record's "active" value
 * @method Address             setStore()       Sets the current record's "Store" value
 * @method Address             setCustomer()    Sets the current record's "Customer" value
 * @method Address             setCity()        Sets the current record's "City" value
 * @method Address             setOffers()      Sets the current record's "Offers" collection
 * 
 * @package    qhawpay
 * @subpackage model
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAddress extends DoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('t_address');
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
        $this->hasColumn('customer_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             'notnull' => true,
             ));
        $this->hasColumn('city_id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             'notnull' => true,
             ));
        $this->hasColumn('street', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             'notnull' => true,
             ));
        $this->hasColumn('zip_code', 'string', 20, array(
             'type' => 'string',
             'length' => 20,
             'notnull' => true,
             ));
        $this->hasColumn('phone', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             'notnull' => true,
             ));
        $this->hasColumn('fax', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             'notnull' => true,
             ));
        $this->hasColumn('mobile', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             'notnull' => true,
             ));
        $this->hasColumn('active', 'string', 1, array(
             'type' => 'string',
             'length' => 1,
             'fixed' => 1,
             'notnull' => true,
             'default' => 0,
             ));


        $this->index('i_street', array(
             'fields' => 
             array(
              0 => 'street',
             ),
             ));
        $this->index('i_active', array(
             'fields' => 
             array(
              0 => 'active',
             ),
             ));
        $this->option('symfony', array(
             'filter' => false,
             'form' => true,
             ));
        $this->option('boolean_columns', array(
             0 => 'active',
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

        $this->hasOne('Customer', array(
             'local' => 'customer_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('City', array(
             'local' => 'city_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT',
             'onUpdate' => 'CASCADE'));

        $this->hasMany('Offer as Offers', array(
             'local' => 'id',
             'foreign' => 'address_id'));

        $sluggableext0 = new Doctrine_Template_SluggableExt(array(
             'fields' => 
             array(
              0 => 'street',
             ),
             ));
        $timestampable0 = new Doctrine_Template_Timestampable();
        $geographical0 = new Doctrine_Template_Geographical();
        $softdelete0 = new Doctrine_Template_SoftDelete();
        $this->actAs($sluggableext0);
        $this->actAs($timestampable0);
        $this->actAs($geographical0);
        $this->actAs($softdelete0);
    }
}