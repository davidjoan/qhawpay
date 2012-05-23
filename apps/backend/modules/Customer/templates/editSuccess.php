<?php slot('title') ?>
  Clientes
<?php end_slot() ?>
<?php slot('subtitle') ?>
  <?php echo $form->isNew() ? 'Nuevo' : 'Editar' ?> Cliente
<?php end_slot() ?>

<?php include_component('Crud', 'edit', array('form' => $form)) ?>