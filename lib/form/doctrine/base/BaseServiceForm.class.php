<?php

/**
 * Service form base class.
 *
 * @method Service getObject() Returns the current form's model object
 *
 * @package    qhawpay
 * @subpackage form
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseServiceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'image'       => new sfWidgetFormInputText(),
      'active'      => new sfWidgetFormInputText(),
      'slug'        => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'stores_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Store')),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 100)),
      'description' => new sfValidatorString(array('max_length' => 5000, 'required' => false)),
      'image'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'active'      => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'slug'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
      'stores_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Store', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Service', 'column' => array('name'))),
        new sfValidatorDoctrineUnique(array('model' => 'Service', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('service[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Service';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['stores_list']))
    {
      $this->setDefault('stores_list', $this->object->Stores->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveStoresList($con);

    parent::doSave($con);
  }

  public function saveStoresList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['stores_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Stores->getPrimaryKeys();
    $values = $this->getValue('stores_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Stores', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Stores', array_values($link));
    }
  }

}
