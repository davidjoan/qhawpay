<?php

/**
 * Address form base class.
 *
 * @method Address getObject() Returns the current form's model object
 *
 * @package    qhawpay
 * @subpackage form
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAddressForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'store_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Store'), 'add_empty' => false)),
      'customer_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Customer'), 'add_empty' => false)),
      'city_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('City'), 'add_empty' => false)),
      'street'      => new sfWidgetFormInputText(),
      'zip_code'    => new sfWidgetFormInputText(),
      'phone'       => new sfWidgetFormInputText(),
      'fax'         => new sfWidgetFormInputText(),
      'mobile'      => new sfWidgetFormInputText(),
      'active'      => new sfWidgetFormInputText(),
      'slug'        => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'latitude'    => new sfWidgetFormInputText(),
      'longitude'   => new sfWidgetFormInputText(),
      'deleted_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'store_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Store'))),
      'customer_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Customer'))),
      'city_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('City'))),
      'street'      => new sfValidatorString(array('max_length' => 200)),
      'zip_code'    => new sfValidatorString(array('max_length' => 20)),
      'phone'       => new sfValidatorString(array('max_length' => 50)),
      'fax'         => new sfValidatorString(array('max_length' => 50)),
      'mobile'      => new sfValidatorString(array('max_length' => 50)),
      'active'      => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'slug'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
      'latitude'    => new sfValidatorPass(array('required' => false)),
      'longitude'   => new sfValidatorPass(array('required' => false)),
      'deleted_at'  => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Address', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('address[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Address';
  }

}
