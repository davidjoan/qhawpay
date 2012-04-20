<?php

/**
 * City form base class.
 *
 * @method City getObject() Returns the current form's model object
 *
 * @package    qhawpay
 * @subpackage form
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCityForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'country_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'add_empty' => false)),
      'code'        => new sfWidgetFormInputText(),
      'name'        => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'image'       => new sfWidgetFormInputText(),
      'active'      => new sfWidgetFormInputText(),
      'slug'        => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'country_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Country'))),
      'code'        => new sfValidatorString(array('max_length' => 5)),
      'name'        => new sfValidatorString(array('max_length' => 100)),
      'description' => new sfValidatorString(array('max_length' => 5000, 'required' => false)),
      'image'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'active'      => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'slug'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'City', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('city[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'City';
  }

}
