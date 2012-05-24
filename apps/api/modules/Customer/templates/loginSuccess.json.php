<?php 
header('Access-Control-Allow-Origin: *');
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json'); ?>
{ 
  "customer" : {
    "id" : "<?php echo $obj->getId();?>",
    "realname" : "<?php echo $obj->getRealname();?>",
    "username" : "<?php echo $obj->getUsername();?>",
    "date-of-birth" : "<?php echo $obj->getDateOfBirth();?>",
    "gender" : "<?php echo $obj->getGenderName();?>",
    "email" : "<?php echo $obj->getEmail();?>",
    "url" : "<?php echo $obj->getUrl();?>",
    "picture" : "<?php echo $obj->getPicture();?>",
    "about" : "<?php echo $obj->getAbout();?>",
    "phone" : "<?php echo $obj->getPhone();?>",
    "active" : "<?php echo $obj->getActiveStr();?>",
    "slug" : "<?php echo $obj->getSlug();?>"
  }
}