<?php 
header('Access-Control-Allow-Origin: *');
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header("Content-Type:text/xml"); ?>
  <service>
    <id><?php echo $obj->getId();?></id>
    <name><?php echo $obj->getName();?></name>
    <description><?php echo $obj->getDescription();?></description>
    <image><?php echo $obj->getImage();?></image>
    <active><?php echo $obj->getStatusStr();?></active>
  </service>