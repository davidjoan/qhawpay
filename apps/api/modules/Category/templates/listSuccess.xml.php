<?php 
header('Access-Control-Allow-Origin: *');
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header("Content-Type:text/xml"); ?>
<categories>
<?php foreach ($pager->getResults() as $object): ?>
  <category>
    <id><?php echo $object->getId();?></id>
    <name><?php echo $object->getName();?></name>
    <description><?php echo $object->getDescription();?></description>
    <image><?php echo $object->getImage();?></image>
    <slug><?php echo $object->getSlug();?></slug>
    <active><?php echo $object->getStatusStr();?></active>
  </category>
<?php endforeach; ?>
</categories>