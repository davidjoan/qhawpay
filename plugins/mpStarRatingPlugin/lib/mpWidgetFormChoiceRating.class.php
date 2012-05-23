<?php

/*
 * This file is extra widget used for our symfony projects.
 * (c) Nei Rauni Santos <nei.rauni@malapronta.com.br>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * To see more about the star reting documentation see http://orkans-tmp.22web.net/star_rating/
 */

/**
 * mpWidgetFormChoiceRating represents a choice widget with javascript code to present as stars options.
 *
 * @package    symfony
 * @subpackage widget
 * @author     Nei Rauni Santos <nei.rauni@malapronta.com.br>
 * @version    SVN: $Id: mpWidgetFormChoiceRating.class.php 11539 2010-05-10 15:23:48Z nrauni $
 */
class mpWidgetFormChoiceRating extends sfWidgetFormChoice
{
  /**
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   *
   * @see sfWidgetFormChoice
   */
  protected function configure($options = array(), $attributes = array())
  {
    parent::configure($options, $attributes);

    $this->setOption('multiple', false);
    $this->setOption('expanded', true);
  }
  

  /**
    * @param  string $name        The element name
    * @param  string $value       The value selected in this widget
    * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
    * @param  array  $errors      An array of errors for the field
    *
    * @return string An HTML tag string
    *
    * @see sfWidgetForm
    */

  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    if ($this->getOption('multiple'))
    {
      $attributes['multiple'] = 'multiple';

      if ('[]' != substr($name, -2))
      {
        $name .= '[]';
      }
    }

    if (!$this->getOption('renderer') && !$this->getOption('renderer_class') && $this->getOption('expanded'))
    {
      unset($attributes['multiple']);
    }
    
    $output = '<div id="wrapper_'.$this->generateId( $name ).'" class="starify">';
    $output .= $this->getRenderer()->render($name, $value, $attributes, $errors);
     
$output .= <<<CODESJAVASCRIPT
    </div>
    
    <script type="text/javascript">
    jQuery(document).ready(function() {
      
      // get the table text and put in the title attribute on radios
      jQuery("#wrapper_{$this->generateId( $name )} > ul.radio_list > li").each( function(){
        jQuery( this ).find('input').attr('title', jQuery( this ).find('label').text());
      });
      
      // Create caption element
      var caption_{$this->generateId( $name )} = jQuery('<div id="caption_{$this->generateId( $name )}" class="caption"></div>');
      jQuery("#wrapper_{$this->generateId( $name )}").children().not(":radio").hide();
      jQuery("#wrapper_{$this->generateId( $name )}").stars({
        inputType: 'radio',
        cancelShow: false,
        captionEl: caption_{$this->generateId( $name )},
      }).append(caption_{$this->generateId( $name )});

    });
    </script>
CODESJAVASCRIPT;

    return $output;
  }



   /**
   * Gets the stylesheet paths associated with the widget.
   *
   * @return array An array of stylesheet paths
   */
  public function getStylesheets()
  {
    return array('/mpStarRatingPlugin/css/jquery.ui.stars.min.css' => 'all');
  }

  /**
   * Gets the JavaScript paths associated with the widget.
   *
   * @return array An array of JavaScript paths
   */
  public function getJavascripts()
  {
    return array(
      'jquery/jquery.ui/ui/ui.core.js', 
      'jquery/jquery.ui/ui/jquery.ui.widget.js', 
      '/mpStarRatingPlugin/js/jquery.ui.stars.min.js'
    );
  }
}
