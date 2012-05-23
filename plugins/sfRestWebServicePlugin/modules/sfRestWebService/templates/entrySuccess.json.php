<?php 
header('Access-Control-Allow-Origin: *');  
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
?>
{"<?php echo $model; ?>s" :[
<?php $nb = count($objects); $i = 0; foreach ($objects as $object): ++$i ?>
{
  "_id": "<?php echo $object['id'] ?>",
<?php $nb1 = count($object); $j = 0; foreach ($object as $key => $value): ++$j ?>
  "<?php echo $key ?>": <?php echo json_encode($value).($nb1 == $j ? '' : ',') ?>

<?php endforeach ?>
}<?php echo $nb == $i ? '' : ',' ?>

<?php endforeach ?>
]
}