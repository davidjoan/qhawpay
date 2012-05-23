<?php 
header('Access-Control-Allow-Origin: *');
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header("Content-Type:text/xml"); ?>
  <photo>
    <id><?php echo $obj->getId();?></id>
    <store>        
        <name><?php echo $obj->getStore()->getName();?></name>
        <logo><?php echo $obj->getStore()->getLogo();?></logo>
        <url><?php echo $obj->getStore()->getUrl();?></url>
        <info><?php echo $obj->getStore()->getInfo();?></info>
        <slug><?php echo $obj->getStore()->getSlug();?></slug>
    </store>
    <customer>
        <realname><?php echo $obj->getCustomer()->getRealname(); ?></realname>
        <username><?php echo $obj->getCustomer()->getUsername(); ?></username>
        <email><?php echo $obj->getCustomer()->getEmail(); ?></email>
        <picture><?php echo $obj->getCustomer()->getPicture(); ?></picture>
        <slug><?php echo $obj->getCustomer()->getSlug(); ?></slug>
    </customer>
    <name><?php echo $obj->getName();?></name>
    <content><?php echo $obj->getContent();?></content>
    <path><?php echo $obj->getPath();?></path>
    <slug><?php echo $obj->getSlug();?></slug>
  </photo>