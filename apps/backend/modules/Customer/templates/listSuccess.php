<?php slot('title') ?>
  Clientes
<?php end_slot() ?>

<?php include_component('Crud', 'list', array
      (
        'pager'              => $pager,
                                
        'uri'                => '@customer_list?filter_by=filter_by&filter=filter&order_by=order_by&order=order&max=max&page=page',
                                
        'edit_field'         => 'realname',
        'filter_fields'      => array
                                (
                                  'username'  => 'Nombre de Usuario',  
                                  'realname'  => 'Nombres y Apellidos',  
                                ),
        'columns'            => array
                                (
                                  array('2' , ''              , ''                    , ''                 ),
                                  array('10', 'username'      , 'Login'               , 'getUsername'      ),
                                  array('10', 'realname'      , 'Nombres y Apellidos' , 'getRealname'      ),
                                  array('10', 'email'         , 'Correo Electrónico'  , 'getEmail'         ),
                                  array('10', 'phone'         , 'Teléfono'            , 'getPhone'         ),
                                  array('10', 'date_of_birth' , 'Fecha de Nacimiento' , 'getFormattedDateOfBirth' ), 
                                  array('6' , 'disable_image' , 'Activo'      , 'getDisableImage', 'center', false),
                                  array('2' , ''              , ''            , 'checkbox'          ),
                                )
      ))
?>
