<?php 
header('Access-Control-Allow-Origin: *');
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header("Content-Type:text/xml"); ?>
  <customer>
    <id><?php echo $obj->getId();?></id>
    <realname><?php echo $obj->getRealname();?></realname>
    <username><?php echo $obj->getUsername();?></username>
    <date-of-birth><?php echo $obj->getDateOfBirth();?></date-of-birth>
    <gender><?php echo $obj->getGenderName();?></gender>
    <email><?php echo $obj->getEmail();?></email>
    <url><?php echo $obj->getUrl();?></url>
    <picture><?php echo $obj->getPicture();?></picture>
    <about><?php echo $obj->getAbout();?></about>
    <phone><?php echo $obj->getPhone();?></phone>
    <active><?php echo $obj->getActiveStr();?></active>
    <slug><?php echo $obj->getSlug();?></slug>
  </customer>