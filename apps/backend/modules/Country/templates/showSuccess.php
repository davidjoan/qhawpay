<?php slot('title') ?>
  Paises
<?php end_slot() ?>

<?php slot('subtitle') ?>
  País: <?php echo $form->getObject()->getName(); ?>
<?php end_slot() ?>

<?php include_component('Crud', 'show', array('form' => $form)) ?>
