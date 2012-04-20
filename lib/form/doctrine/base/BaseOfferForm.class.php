<?php

/**
 * Offer form base class.
 *
 * @method Offer getObject() Returns the current form's model object
 *
 * @package    qhawpay
 * @subpackage form
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseOfferForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'store_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Store'), 'add_empty' => false)),
      'address_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Address'), 'add_empty' => false)),
      'customer_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Customer'), 'add_empty' => false)),
      'title'       => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'image'       => new sfWidgetFormInputText(),
      'active'      => new sfWidgetFormInputText(),
      'slug'        => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'store_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Store'))),
      'address_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Address'))),
      'customer_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Customer'))),
      'title'       => new sfValidatorString(array('max_length' => 100)),
      'description' => new sfValidatorString(array('max_length' => 5000, 'required' => false)),
      'image'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'active'      => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'slug'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Offer', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('offer[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Offer';
  }

}
