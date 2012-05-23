<?php

/**
 * Customer form.
 *
 * @package    qhawpay
 * @subpackage form
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CustomerForm extends BaseCustomerForm
{
  public function initialize()
  {    
  $this->labels = array
    (
      'realname' => 'Nombres y Apellidos',
      'username' => 'Nombres de Usuario',
      'date_of_birth' => 'Fecha de Nacimiento',
      'gender' => 'Genero',
      'picture' => 'Foto',
      'email' => 'Email',
      'about' => 'Descripción',
      'url' => 'Página web personal',
      'twitter_username' => 'Cuenta de Twitter',
      'phone' => 'Teléfono',
      'facebook_id' => 'facebook_id',
      'email_hash' => 'Email Hash for facebook',
      'is_admin' => 'Es Administrador',
      'active' => 'Activo',
    );
  }
 
  
  public function configure()
  {
    $this->setWidgets(array
    (
      'id' => new sfWidgetFormInputHidden(),
      'realname' => new sfWidgetFormInputText(array(), array('size' => 50)),
      'username' => new sfWidgetFormInputText(array(), array('size' => 30)),
      'date_of_birth' => new sfWidgetFormDateExt(array
                                (
                                  'format' => $this->widgetFormatter->getStandardDateFormat(),
                                  'year_start' => 1920,
                                  'year_end' => date('Y') - 5,
                                )),
      'gender' => new sfWidgetFormChoice(array
                                    (
                                      'choices' => $this->getTable()->getGenders(),
                                      'expanded' => true,
                                      'renderer_options' => array('formatter' => array($this->widgetFormatter, 'radioFormatter'))
                                    )),
      'picture' => new sfWidgetFormInputFileEditable
                                    (
                                      array
                                      (
                                        'file_src' => $this->object->getPicture(),
                                        'with_delete' => false,
                                        'template' => sprintf
                                                          (
                                                            '<a class="file_link" href="%s/%%file%%" target="BLANK">%%file%%</a><br />%%input%%<br />%%delete%% %%delete_label%%',
                                                            sfConfig::get('app_customer_images_path')
                                                          )
                                      ),
                                      array('size' => '60')
                                    ),
      'email' => new sfWidgetFormInputText(array(), array('size' => 30)),
      'about' => new sfWidgetFormTextareaTinyMCE(array
                                    (
                                      'width' => 350,
                                      'height' => 150,
                                      'config' => 'theme_advanced_buttons2 : ""',
                                    )),
      'url' => new sfWidgetFormInputText(array(), array('size' => 70)),
      'twitter_username' => new sfWidgetFormInputText(array(), array('size' => 50)),
      'facebook_id' => new sfWidgetFormInputText(array(), array('size' => 50)),
      'phone' => new sfWidgetFormInputText(array(), array('size' => 20)),
      'active' => new sfWidgetFormChoice(array
                                    (
                                      'choices' => $this->getTable()->getStatuss(),
                                      'expanded' => true,
                                      'renderer_options' => array('formatter' => array($this->widgetFormatter, 'radioFormatter'))
                                    )),

      'is_admin' => new sfWidgetFormChoice(array
                                    (
                                      'choices' => $this->getTable()->getIsAdmin(),
                                      'expanded' => true,
                                      'renderer_options' => array('formatter' => array($this->widgetFormatter, 'radioFormatter'))
                                    )),
    ));

    $this->addValidators(array
    (
      'picture' => new sfValidatorFile(array
                                (
                                  'required' => false,
                                  'path' => sfConfig::get('app_customer_images_dir').'/'
                                ))
    ));

    $this->setDefault('gender', CustomerTable::GENDER_MALE);

    $this->types = array
    (
      'id' => '=',
      'realname' => 'name',
      'username' => 'text',
      'password' => '-',
      'email' => 'email',
      'url' => 'url',
      'date_of_birth' => 'date',
      'twitter_username' => 'text',
      'facebook_id' => 'text',
      'phone' => 'phone',
      'gender' => array('combo', array('choices' => array_keys($this->getTable()->getGenders()))),
      'picture' => 'file',
      'about' => '=',
      'is_admin' => array('combo', array('choices' => array_keys($this->getTable()->getIsAdmin()))),
      'active' => array('combo', array('choices' => array_keys($this->getTable()->getStatuss()))),
      'last_access_at'   => '-',
      'email_hash' => '-',
      'slug' => '-',
      'created_at' => '-',
      'updated_at' => '-');
  
  }  
}
