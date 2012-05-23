<?php slot('title') ?>
  Tiendas
<?php end_slot() ?>

<?php include_component('Crud', 'list', array
      (
        'pager'              => $pager,
                                
        'uri'                => '@store_list?filter_by=filter_by&filter=filter&order_by=order_by&order=order&max=max&page=page',
                                
        'edit_field'         => 'name',
        'filter_fields'      => array
                                (
                                  'name'  => 'Nombre'
                                ),
        'columns'            => array
                                (
                                  array('2' , ''              , ''            , ''                  ),
                                  array('10', 'name'          , 'Nombre'      , 'getName'           ),
                                  array('10', 'phrase'        , 'Frase'       , 'getPhrase'         ),
                                  array('10', 'qty_votes'     , 'Cantidad de Votos' , 'getQtyVotes' ),
                                  array('10', 'status'        , 'Estado'      , 'getStatusStr'      ),
                                  array('2' , ''              , ''            , 'checkbox'          ),
                                )
      ))
?>
