<?php

/**
 * Address form.
 *
 * @package    qhawpay
 * @subpackage form
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AddressForm extends BaseAddressForm
{
  public function initialize()
  {
    $this->labels = array
    (
      'customer_id'           => 'Cliente',    
      'country_id'           => 'País',
      'city_id'              => 'Ciudad',
      'street'               => 'Dirección',
      'zip_code'             => 'Codigo Postal',
      'phone'                => 'Teléfono',
      'fax'                  => 'Fax',
      'mobile'               => 'Celular',
      'active'               => 'Activo',
    );
  }
  
  public function configure()
  {
    $this->getObject()->setCustomerId(sfContext::getInstance()->getUser()->getUserId());
    $this->setWidgets(array
    (
      'id'                   => new sfWidgetFormInputHidden(),
      //'store_id'             => new sfWidgetFormInputHidden(),
   //   'customer_id'          => new sfWidgetFormInputHidden(),
      'country_id'           => new sfWidgetFormDoctrineChoice(array('model'   => 'Country', 'add_empty' => '--- Seleccionar ---')),
      'city_id'              => new sfWidgetFormDoctrineDependentSelect(array('model' => 'City','depends' => 'Country', 'add_empty' => '--- Seleccionar ---')),
      //'street'               => new sfWidgetFormInput(array(), array('size' => '30')),
      'street'               => new sfWidgetFormGMapAddress(array('default' => array('address' => $this->getObject()->getAddress(), 'latitude' => $this->getObject()->getLatitude(), 'longitude' => $this->getObject()->getLongitude()))),
      'zip_code'             => new sfWidgetFormInput(array(), array('size' => '30')),
      'phone'                => new sfWidgetFormInput(array(), array('size' => '10')),
      'fax'                  => new sfWidgetFormInput(array(), array('size' => '10')),
      'mobile'               => new sfWidgetFormInput(array(), array('size' => '10')),
      'active'               => new sfWidgetFormChoice(array
                                (
                                  'choices'          => $this->getTable()->getStatuss(),
                                  'expanded'         => true,
                                  'renderer_options' => array('formatter' => array($this->widgetFormatter, 'radioFormatter'))
                                ))

    ));
    
    //$this->setValidator('street', new sfValidatorString());
//    $this->setDefault('customer_id',sfContext::getInstance()->getUser()->getUserId());    
    
    $this->getWidget('street')->render('street', array('address' => $this->getObject()->getAddress(), 'latitude' => $this->getObject()->getLatitude(), 'longitude' => $this->getObject()->getLongitude()),array(),array());
    
    $this->types = array
    (   
      'id'          => '=',
      'store_id'    => '-',
      'customer_id' => '-',
      'country_id'  => 'combo',
      'city_id'     => 'combo',
      'street'      => 'text',
      'zip_code'    => 'text',
      'phone'       => 'phone',
      'fax'         => 'phone',
      'mobile'      => 'phone',
      'active'      => array('combo', array('choices' => array_keys($this->getTable()->getStatuss()))),
      'slug'        => '-',
      'created_at'  => '-',
      'updated_at'  => '-',
      'address'     => '-',
      'latitude'    => '-',
      'longitude'   => '-',
      'deleted_at'  => '-',
        
    );
  }
}