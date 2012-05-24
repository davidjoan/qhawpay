<?php 
header('Access-Control-Allow-Origin: *');
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
$count = count($pager->getResults()); 
$i = 0; ?>
{ 
  "photos" : [
<?php foreach ($pager->getResults() as $obj): ?>
  <?php $i++;?>
{ 
  "photo" : {
    "id" : "<?php echo $obj->getId();?>",
    "store" : 
    { 
      "name" : "<?php echo $obj->getStore()->getName(); ?>",
      "logo" : "<?php echo $obj->getStore()->getLogo(); ?>",
      "url" : "<?php echo $obj->getStore()->getUrl(); ?>",
      "info" : "<?php echo $obj->getStore()->getInfo(); ?>",
      "slug" : "<?php echo $obj->getStore()->getSlug(); ?>",
    },
    "customer" : 
    { 
      "realname" : "<?php echo $obj->getCustomer()->getRealname(); ?>",
      "username" : "<?php echo $obj->getCustomer()->getUsername(); ?>",
      "email" : "<?php echo $obj->getCustomer()->getEmail(); ?>",
      "picture" : "<?php echo $obj->getCustomer()->getPicture(); ?>",
      "slug" : "<?php echo $obj->getCustomer()->getSlug(); ?>",
    },    
    "name" : "<?php echo $obj->getName();?>",
    "content" : "<?php echo $obj->getContent();?>",
    "path" : "<?php echo $obj->getPath();?>",
    "slug" : "<?php echo $obj->getSlug();?>"
  }
}<?php echo ($count == $i ? '' : ','); ?>
<?php endforeach; ?>
]}