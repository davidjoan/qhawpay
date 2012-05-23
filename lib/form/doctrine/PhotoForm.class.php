<?php

/**
 * Photo form.
 *
 * @package    qhawpay
 * @subpackage form
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PhotoForm extends BasePhotoForm
{    
  public function initialize()
  {
    $this->labels = array
    (
      'name'                 => 'Descripción',
      'path'                 => 'Imagen',
    );
  }
  
  public function configure()
  {
    $this->setWidgets(array
    (
      'id'                   => new sfWidgetFormInputHidden(),
  //    'store_id'             => new sfWidgetFormInputHidden(),
      'path'                 => new sfWidgetFormInputFileEditable
                                (
                                  array
                                  (
                                    'file_src'     => $this->object->getPath(),
                                    'with_delete'  => false,
                                    'template'     => sprintf
                                                      (
                                                        '<a class="file_link" href="%s/%%file%%" target="BLANK">%%file%%</a><br />%%input%%<br />%%delete%% %%delete_label%%', 
                                                        sfConfig::get('app_photo_images_path')
                                                      )
                                  ),
                                  array('size'         => '60',)
                                ),
        'name'                 => new sfWidgetFormInput(array(), array('size' => '30')),
    ));
    
    $this->addValidators(array
    (
      'path'                 => new sfValidatorFile(array
                                (
                                  'required'   => false,
                                  'path'       => sfConfig::get('app_photo_images_dir').'/'
                                )),
    ));
    
    $this->types = array
    (
      'id'                      => '=',
      'store_id'                => '-',
      'name'                    => 'text',
      'path'                    => 'file',
      'size'                    => '-',
      'full_mime'               => '-',
      'rank'                    => '-',
      'slug'                    => '-',
      'created_at'              => '-',
      'updated_at'              => '-'
    );
    
        $this->validatorSchema['name']->setOption('required', false); 
  }
}
