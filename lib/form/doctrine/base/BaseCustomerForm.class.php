<?php

/**
 * Customer form base class.
 *
 * @method Customer getObject() Returns the current form's model object
 *
 * @package    qhawpay
 * @subpackage form
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCustomerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'realname'         => new sfWidgetFormInputText(),
      'username'         => new sfWidgetFormInputText(),
      'password'         => new sfWidgetFormInputText(),
      'date_of_birth'    => new sfWidgetFormDate(),
      'gender'           => new sfWidgetFormInputText(),
      'email'            => new sfWidgetFormInputText(),
      'url'              => new sfWidgetFormInputText(),
      'picture'          => new sfWidgetFormInputText(),
      'about'            => new sfWidgetFormTextarea(),
      'twitter_username' => new sfWidgetFormInputText(),
      'phone'            => new sfWidgetFormInputText(),
      'active'           => new sfWidgetFormInputText(),
      'last_access_at'   => new sfWidgetFormDateTime(),
      'facebook_id'      => new sfWidgetFormInputText(),
      'email_hash'       => new sfWidgetFormInputText(),
      'is_admin'         => new sfWidgetFormInputText(),
      'slug'             => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
      'deleted_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'realname'         => new sfValidatorString(array('max_length' => 200)),
      'username'         => new sfValidatorString(array('max_length' => 50)),
      'password'         => new sfValidatorString(array('max_length' => 255)),
      'date_of_birth'    => new sfValidatorDate(array('required' => false)),
      'gender'           => new sfValidatorString(array('max_length' => 1)),
      'email'            => new sfValidatorString(array('max_length' => 100)),
      'url'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'picture'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'about'            => new sfValidatorString(array('max_length' => 5000, 'required' => false)),
      'twitter_username' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'phone'            => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'active'           => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'last_access_at'   => new sfValidatorDateTime(array('required' => false)),
      'facebook_id'      => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'email_hash'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_admin'         => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'slug'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
      'deleted_at'       => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Customer', 'column' => array('email'))),
        new sfValidatorDoctrineUnique(array('model' => 'Customer', 'column' => array('facebook_id'))),
        new sfValidatorDoctrineUnique(array('model' => 'Customer', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('customer[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Customer';
  }

}
