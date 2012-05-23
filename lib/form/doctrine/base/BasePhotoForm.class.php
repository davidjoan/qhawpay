<?php

/**
 * Photo form base class.
 *
 * @method Photo getObject() Returns the current form's model object
 *
 * @package    qhawpay
 * @subpackage form
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePhotoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'store_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Store'), 'add_empty' => false)),
      'customer_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Customer'), 'add_empty' => false)),
      'name'        => new sfWidgetFormInputText(),
      'content'     => new sfWidgetFormTextarea(),
      'path'        => new sfWidgetFormInputText(),
      'size'        => new sfWidgetFormInputText(),
      'full_mime'   => new sfWidgetFormInputText(),
      'rank'        => new sfWidgetFormInputText(),
      'ip'          => new sfWidgetFormInputText(),
      'agent'       => new sfWidgetFormInputText(),
      'approved'    => new sfWidgetFormInputText(),
      'slug'        => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'deleted_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'store_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Store'))),
      'customer_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Customer'))),
      'name'        => new sfValidatorString(array('max_length' => 100)),
      'content'     => new sfValidatorString(array('max_length' => 5000)),
      'path'        => new sfValidatorString(array('max_length' => 255)),
      'size'        => new sfValidatorInteger(array('required' => false)),
      'full_mime'   => new sfValidatorString(array('max_length' => 100)),
      'rank'        => new sfValidatorInteger(array('required' => false)),
      'ip'          => new sfValidatorString(array('max_length' => 100)),
      'agent'       => new sfValidatorString(array('max_length' => 255)),
      'approved'    => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'slug'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
      'deleted_at'  => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Photo', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('photo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Photo';
  }

}
