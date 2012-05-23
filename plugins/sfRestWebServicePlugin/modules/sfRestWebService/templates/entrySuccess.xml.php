<?php 
header('Access-Control-Allow-Origin: *');
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header("Content-Type:text/xml"); ?>
<<?php echo $model; ?>s>
<?php foreach ($objects as $object): ?>
  <<?php echo $model; ?>>
<?php foreach ($object as $key => $value): ?>
    <<?php echo $key ?>><?php echo $value ?></<?php echo $key ?>>
<?php endforeach ?>
<?php if($model == "address"): ?>
<store><?php echo $object->getStore()->getName(); ?></store>
<customer><?php echo $object->getCustomer()->getRealname(); ?></customer>
<country><?php echo $object->getCountry()->getName(); ?></country>
<city><?php echo $object->getCity()->getName(); ?></city>
<?php endif; ?>
  </<?php echo $model; ?>>
<?php endforeach ?>
</<?php echo $model; ?>s>