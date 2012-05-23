<?php

/**
 * City form.
 *
 * @package    qhawpay
 * @subpackage form
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CityForm extends BaseCityForm
{
  public function initialize()
  {
    $this->labels = array
    (
      'code'         => 'Código',
      'country_id'   => 'País',
      'name'         => 'Nombre',
      'description'  => 'Descripción',
      'image'        => 'Imagen',
      'active'       => 'Activo'
    );
  }    
  public function configure()
  {
  	$this->setWidgets(array
    (
      'id'                   => new sfWidgetFormInputHidden(),
      'code'                 => $this->getObject()->isNew()
                                ? new sfWidgetFormInput()
                                : new sfWidgetFormValue(array('value' => $this->getObject()->getCode())),
      'name'                 => new sfWidgetFormInputText(array(), array('size' => '40')),
      'country_id'           => new sfWidgetFormDoctrineChoice(array
                                (
                                  'model'     => $this->getRelatedModelName('Country'),
                                  'add_empty' => '--- Seleccionar ---'
                                )),
      'description'          => new sfWidgetFormTextareaTinyMCE(array
                                (
                                  'width'            => 450,
                                  'height'           => 250,
                                  'config'           => 'theme_advanced_disable: "anchor,cleanup,help"',
                                )),
      'image'                => new sfWidgetFormInputFileEditable
                                (
                                  array
                                  (
                                    'file_src'     => $this->object->getImage(),
                                    'with_delete'  => false,
                                    'template'     => sprintf
                                                      (
                                                        '<a class="file_link" href="%s/%%file%%" target="BLANK">%%file%%</a><br />%%input%%<br />%%delete%% %%delete_label%%', 
                                                        sfConfig::get('app_country_images_path')
                                                      )
                                  ),
                                  array('size'         => '60')
                                ),
      'active'               => new sfWidgetFormChoice(array
                                (
                                  'choices'          => $this->getTable()->getStatuss(),
                                  'expanded'         => true,
                                  'renderer_options' => array('formatter' => array($this->widgetFormatter, 'radioFormatter'))
                                ))
    ));            
        
    $this->setDefault('active', '1');
    $this->addValidators(array
    (
      'image'                 => new sfValidatorFile(array
                                (
                                  'required'   => false,
                                  'path'       => sfConfig::get('app_country_images_dir').'/'
                                ))
    ));
    
    if (!$this->isNew())
    {
      unset($this->validatorSchema['code']);
    }
    
    $this->types = array
    (
      'id'          => '=', 
      'country_id'  => 'combo',
      'code'        => $this->getObject()->isNew() ? 'code': '-',
      'name'        => 'name',
      'description' => '=',
      'image'       => 'file',
      'slug'        => '=',
      'active'      => array('combo', array('choices' => array_keys($this->getTable()->getStatuss()))),
      'created_at'  => '-',
      'updated_at'  => '-'
    );
  }
}
