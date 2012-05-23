<?php slot('title') ?>
  Paises
<?php end_slot() ?>
<?php slot('subtitle') ?>
  <?php echo $form->isNew() ? 'Nueva' : 'Editar' ?> País
<?php end_slot() ?>

<?php include_component('Crud', 'edit', array('form' => $form)) ?>