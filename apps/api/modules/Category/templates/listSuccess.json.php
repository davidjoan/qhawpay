<?php 
header('Access-Control-Allow-Origin: *');
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
$count = count($pager->getResults()); 
$i = 0; ?>
{ 
  "categories" : [
<?php foreach ($pager->getResults() as $object): ?>
  <?php $i++;?>
  {
    "id" : "<?php echo $object->getId();?>",
    "name" : "<?php echo $object->getName();?>",
    "description" : "<?php echo $object->getDescription();?>",
    "image" : "<?php echo $object->getImage();?>",
    "slug" : "<?php echo $object->getSlug();?>",
    "active" : "<?php echo $object->getStatusStr();?>"
  }<?php echo ($count == $i ? '' : ','); ?>
<?php endforeach; ?>
]}