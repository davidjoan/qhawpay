<?php slot('title') ?>
  Ciudades
<?php end_slot() ?>

<?php slot('subtitle') ?>
  Ciudad: <?php echo $form->getObject()->getName(); ?>
<?php end_slot() ?>

<?php include_component('Crud', 'show', array('form' => $form)) ?>
