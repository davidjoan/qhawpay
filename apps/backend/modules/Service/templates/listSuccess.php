<?php slot('title') ?>
  Servicios
<?php end_slot() ?>

<?php include_component('Crud', 'list', array
      (
        'pager'              => $pager,
                                
        'uri'                => '@service_list?filter_by=filter_by&filter=filter&order_by=order_by&order=order&max=max&page=page',
                                
        'edit_field'         => 'name',
        'filter_fields'      => array
                                (
                                  'name'  => 'Nombre',  
                                  'active'  => 'Activo',  
                                ),
        'columns'            => array
                                (
                                  array('2' , ''              , ''            , ''                 ),
                                  array('10', 'name'          , 'Nombre'      , 'getName'          ),
                                  array('10', 'description'   , 'Description' , 'getDescription'   ),
                                  array('6' , 'disable_image' , 'Activo'      , 'getDisableImage' , 'center', false),
                                  array('2' , ''              , ''            , 'checkbox'         ),
                                )
      ))
?>
