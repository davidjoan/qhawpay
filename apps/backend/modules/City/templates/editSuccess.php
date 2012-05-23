<?php slot('title') ?>
  Ciudades
<?php end_slot() ?>
<?php slot('subtitle') ?>
  <?php echo $form->isNew() ? 'Nueva' : 'Editar' ?> Ciudad
<?php end_slot() ?>

<?php include_component('Crud', 'edit', array('form' => $form)) ?>