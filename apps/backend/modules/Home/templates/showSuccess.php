Bienvenidos a Sistema de Administración de Qhawpay.pe
<br>
<?php
    $map = new PhoogleMap();
    $map->setAPIKey('AIzaSyA_vOSv_jenLylYs1wZDv4YxRn7kkgVXj0');
    $map->setZoomLevel(6);
    $map->setWidth(700);
    $map->setHeight(400);
    $map->controlType  = 'large';
    $addresses = Doctrine::getTable('Address')->findAll();
    foreach($addresses as $address)
    {
      $map->addGeoPoint($address->getLatitude(), $address->getLongitude(), $address->getDescripcion());    
    }
    

    slot('gmapheader');
    $map->printGoogleJS();
    end_slot();

    echo $map->showMap(); 
    ?>