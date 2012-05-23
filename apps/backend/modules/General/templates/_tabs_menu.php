<table class="menu">
  <tr>
    <td width="99%">
      <table class="submenu">
        <tr>
          <?php include_partial('General/tab', array
                (
                  'title'       => 'Inicio', 
                  'uri'         => '@home',
                  'image'       => 'backend/menu/home.gif',
                ))
          ?>
          <?php include_partial('General/tab', array
                (
                  'title'       => 'Categorias', 
                  'uri'         => '@category_list',
                  'image'       => 'backend/menu/inventory.gif',
                ))
          ?>
          <?php include_partial('General/tab', array
                (
                  'title'       => 'Ciudades', 
                  'uri'         => '@city_list',
                  'image'       => 'backend/menu/campaigns.gif',
                ))
          ?>
          <?php include_partial('General/tab', array
                (
                  'title'       => 'Paises', 
                  'uri'         => '@country_list',
                  'image'       => 'backend/menu/campaigns.gif',
                ))
          ?>
          <?php include_partial('General/tab', array
                (
                  'title'       => 'Clientes', 
                  'uri'         => '@customer_list',
                  'image'       => 'backend/menu/customers.gif',
                ))
          ?>          
          <?php /*include_partial('General/tab', array
                (
                  'title'       => 'Ofertas', 
                  'uri'         => '@offer_list',
                  'image'       => 'backend/menu/marketing.gif',
                ))*/
          ?>

          <?php /*include_partial('General/tab', array
                (
                  'title'       => 'Fotos', 
                  'uri'         => '@photo_list',
                  'image'       => 'backend/menu/campaigns.gif',
                ))*/
          ?>
          <?php include_partial('General/tab', array
                (
                  'title'       => 'Servicios', 
                  'uri'         => '@service_list',
                  'image'       => 'backend/menu/inventory.gif',
                ))
          ?>
          <?php include_partial('General/tab', array
                (
                  'title'       => 'Tiendas', 
                  'uri'         => '@store_list',
                  'image'       => 'backend/menu/orders.gif',
                ))
          ?>
        </tr>
      </table>
    </td>
    <td width="1%">
      <table class="submenu">
        <tr>
          <?php include_partial('General/tab', array
                (
                  'title'       => 'Cerrar Sesi&oacute;n', 
                  'uri'         => '@log_logout',
                  'image'       => 'backend/menu/logout.gif',
                ))
          ?>
      </table>
    </td>
  </tr>
</table>
