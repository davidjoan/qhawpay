<?php

/**
 * Store form.
 *
 * @package    qhawpay
 * @subpackage form
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StoreForm extends BaseStoreForm
{  
  protected
    $photoDynamicFormManager = null,
    $addressDynamicFormManager = null;  
    
  public function initialize()
  {
    $this->labels = array
    (
      'customer_id'     => 'Cliente Creador',
      'ruc'             => 'Ruc',
      'name'            => 'Nombre',
      'logo'            => 'Logotipo',
      'phrase'          => 'Frase',
      'info'            => 'Información',
      'description'     => 'Descripción',
      'datetime'        => 'Fecha de Fundación',
      'qty_votes'       => 'Cantidad de Votos',
      'url'             => 'url',      
      'status'          => 'Estado',
      'categories_list' => 'Categorias',
      'services_list'   => 'Servicios Ofrecidos',
      'tags_list'       => 'Tags',
    );
  }    
  public function configure()
  {
    $options = array(0 => 'Malo', 1 => 'Pesimo', 2 => 'Promedio', 3 => 'Mediano', 4 => 'Muy Bueno', 5 => 'Excelente');

    $this->setWidgets(array
    (
      'id'                   => new sfWidgetFormInputHidden(),
      'customer_id'          => new sfWidgetFormDoctrineChoice(array
                                (
                                  'model'     => $this->getRelatedModelName('Customer'),
                                  'add_empty' => '--- Seleccionar ---'
                                )),
      'ruc'                  => new sfWidgetFormInputText(array(), array('size' => 11, 'maxlength' => 11)),
      'name'                 => new sfWidgetFormInputText(array(), array('size' => '40')),
      'qty_votes'            => new mpWidgetFormChoiceRating( array('choices' => $options ) ),
      'tags_list' => new sfWidgetFormDoctrineChoice(array
                                (
                                  'model' => $this->getRelatedModelName('Tags'),
                                  'expanded' => true,
                                  'multiple' => true,
                                  'renderer_options' => array('formatter' => array($this->widgetFormatter, 'radioFormatter'))
                                )),                      
      'logo'                 => new sfWidgetFormInputFileEditable
                                (
                                  array
                                  (
                                    'file_src'     => $this->object->getLogo(),
                                    'with_delete'  => false,
                                    'template'     => sprintf
                                                      (
                                                        '<a class="file_link" href="%s/%%file%%" target="BLANK">%%file%%</a><br />%%input%%<br />%%delete%% %%delete_label%%', 
                                                        sfConfig::get('app_store_images_path')
                                                      )
                                  ),
                                  array('size'         => '60')
                                ),            
      'url'                 => new sfWidgetFormInputText(array(), array('size' => '40')),                                
      'phrase'               => new sfWidgetFormTextarea(array(), array('cols' => 50, 'rows' => 5)),
      'info'                 => new sfWidgetFormTextarea(array(), array('cols' => 50, 'rows' => 9)),
      'description'          => new sfWidgetFormTextarea(array(), array('cols' => 50, 'rows' => 5)),
      'services_list' => new sfWidgetFormDoctrineChoice(array
                                (
                                  'model' => $this->getRelatedModelName('Services'),
                                  'expanded' => true,
                                  'multiple' => true,
                                  'renderer_options' => array('formatter' => array($this->widgetFormatter, 'radioFormatter'))
                                )),              
      'datetime'             => new sfWidgetFormDateExt(array
                                (
                                  'format' => $this->widgetFormatter->getStandardDateFormat(),
                                  'year_start' => 1920,
                                  'year_end' => date('Y'),
                                )),
      //'qty_votes'            => new sfWidgetFormInputText(array(), array('size' => 5)),            
      'status'               => new sfWidgetFormChoice(array
                                (
                                  'choices'          => $this->getTable()->getStatuss(),
                                  'expanded'         => true,
                                  'renderer_options' => array('formatter' => array($this->widgetFormatter, 'radioFormatter'))
                                )),
      'categories_list' => new sfWidgetFormDoctrineChoice(array
                                (
                                  'model' => $this->getRelatedModelName('Categories'),
                                  'expanded' => true,
                                  'multiple' => true,
                                  'renderer_options' => array('formatter' => array($this->widgetFormatter, 'radioFormatter'))
                                )),                
    ));            
        
    $this->setDefault('status', '1');
    $this->setDefault('customer_id',sfContext::getInstance()->getUser()->getUserId());    
    $this->addValidators(array
    (
      'logo'                 => new sfValidatorFile(array
                                (
                                  'required'   => false,
                                  'path'       => sfConfig::get('app_store_images_dir').'/'
                                )),
      'ruc'            => new sfValidatorString(array('max_length' => 11, 'min_length' => 11)),
    ));
  	
  $this->types = array
    (
      'id'          => '=', 
      'customer_id' => 'combo',
      'ruc'             => 'fixed_number',
      'name'            => 'name',
      'logo'            => 'file',
      'phrase'          => 'text',
      'url'             => 'url',      
      'info'            => 'text',
      'description'     => 'text',
      'datetime'        => 'date',
      'qty_votes'       => 'fixed_number',
      'status'          => array('combo', array('choices' => array_keys($this->getTable()->getStatuss()))),
      'slug'            => '-',
      'created_at'      => '-',
      'updated_at'      => '-',
      'deleted_at'      => '-',
      'categories_list' => 'list',
      'services_list'   => 'list',
      'tags_list'       => 'list'
    );
  
    $this->validatorSchema['datetime']->setOption('required', false); 
    $this->validatorSchema['ruc']->setOption('required', false); 
    
    $this->addPhotosForm();
    $this->addAddressForm();
  }
  
  public function addPhotosForm()
  {
    $this->photoDynamicFormManager = new sfDynamicFormEmbedderManager('photo', $this->object->getPhotos()->getRelation(), 'Fotos', $this, null, new sfCallable(array($this->object, 'getPhotos')));
    
  }
  
  public function addAddressForm()
  {
    $this->photoDynamicFormManager = new sfDynamicFormEmbedderManager('address', $this->object->getAddresses()->getRelation(), 'Direcciones', $this, null, new sfCallable(array($this->object, 'getAddresses')));
  }
  
  public function updateObject($values = null)
  {
  

    if (is_null($values))
    {
      $values = $this->values;
    }

    $values = $this->processValues($values);
    $values = $this->updateValues($values);
    
     $store = $this->getRequest()->getParameter('store');    
    
    $key = 1;
    foreach($values['address_container'] as $val)
    {
        $address   = $store['address_container'][$key]['street']['address'];
        $longitude = $store['address_container'][$key]['street']['longitude'];
        $latitude  = $store['address_container'][$key]['street']['latitude'];    
        $country_id= $store['address_container'][$key]['country_id'];    
        $values['address_container'][$key]['country_id'] = $country_id;        
        $values['address_container'][$key]['address'] = $address;
        $values['address_container'][$key]['longitude'] = $longitude;
        $values['address_container'][$key]['latitude'] = $latitude;
        $key++;
    }

     


    $this->object->fromArray($values);
   

    // embedded forms
    $this->checkEmbeddedForms($values);
    $this->updateObjectEmbeddedForms($values);


    return $this->object;
  }    
  
}
