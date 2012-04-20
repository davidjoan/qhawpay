<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();
require_once(dirname(__FILE__).'/../plugins/symfextPlugin/config/sfProjectConfigurationExt.class.php');

class ProjectConfiguration extends sfProjectConfigurationExt
{
  protected function getActivePlugins()
  {
    return array
           (
             'sfMediaBrowserPlugin',
             'sfDependentSelectPlugin',
             'sfFormExtraPlugin',
             'sfDoctrinePlugin',
             'symfextPlugin'
           );
  }
  
  protected function setConfigVariables()
  {
    
    parent::setConfigVariables();
    //sfConfig::set('sf_web_path','/');
    sfConfig::set('site_name', 'Qhawpay');
    //$this->setWebDir($this->getRootDir().'/public_html');
    
    $this->setConfigDirPathVariable('country_images'       , sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'country_images'       );
    $this->setConfigDirPathVariable('city_images'          , sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'city_images'          );
    $this->setConfigDirPathVariable('store_images'         , sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'store_images'         );
    $this->setConfigDirPathVariable('photo_images'         , sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'photo_images'         );
    $this->setConfigDirPathVariable('customer_images'      , sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'customer_images'      );

    $this->setConfigDirPathVariable('service_images'       , sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'service_images'       );
    $this->setConfigDirPathVariable('offer_images'         , sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'offer_images'         );
    $this->setConfigDirPathVariable('store_images'         , sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'store_images'         );
    $this->setConfigDirPathVariable('category_images'      , sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'store_images'         );        
  }
}
