<h1>Bienvenidos al Administrador de Contenidos</h1>
<hr/>
<br/><br/>
<?php include_component('Generic', 'form', array
      (
        'form'          => $form,
        'action_uri'    => '@log_login',
        'styles_folder' => 'log',
        'submit'        => 'Ingresar',
        'with_title'    => false
      ))
?>