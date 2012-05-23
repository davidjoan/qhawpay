<?php slot('title') ?>
  Categorias
<?php end_slot() ?>
<?php slot('subtitle') ?>
  <?php echo $form->isNew() ? 'Nueva' : 'Editar' ?> Categoria
<?php end_slot() ?>

<?php include_component('Crud', 'edit', array('form' => $form)) ?>