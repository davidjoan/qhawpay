<?php
header('Access-Control-Allow-Origin: *');
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
$count = count($pager->getResults());
$i = 0;
?>
{ 
"stores" : [
<?php foreach ($pager->getResults() as $object): ?>
    <?php $obj = $object->getStore(); ?>
    <?php $i++; ?>
    { 
    "id" : "<?php echo $obj->getId(); ?>",
    "customer" : 
    { 
    "realname" : "<?php echo $obj->getCustomer()->getRealname(); ?>",
    "username" : "<?php echo $obj->getCustomer()->getUsername(); ?>",
    "email" : "<?php echo $obj->getCustomer()->getEmail(); ?>",
    "picture" : "<?php echo $obj->getCustomer()->getPicture(); ?>",
    "slug" : "<?php echo $obj->getCustomer()->getSlug(); ?>",
    },   
    "categories" : [
    <?php $count_categories = count($obj->getCategories());
    $l = 0; ?>
    <?php foreach ($obj->getCategories() as $category): ?>
        <?php $l++; ?>
        {
        "id" : "<?php echo $category->getId(); ?>",   
        "name" : "<?php echo $category->getName(); ?>",
        "slug" : "<?php echo $category->getSlug(); ?>"
        }<?php echo ($count_categories == $l ? '' : ','); ?>
    <?php endforeach; ?>],     
    "services" : [
    <?php $count_services = count($obj->getServices());
    $k = 0; ?>
    <?php foreach ($obj->getServices() as $service): ?>
        <?php $k++; ?>
        {
        "id" : "<?php echo $service->getId(); ?>",   
        "name" : "<?php echo $service->getName(); ?>",
        "slug" : "<?php echo $service->getSlug(); ?>"
        }<?php echo ($count_services == $k ? '' : ','); ?>
    <?php endforeach; ?>],    
    "addresses" : [
    <?php $count_address = count($obj->getAddresses());
    $m = 0;
    ?>
    <?php foreach ($obj->getAddresses() as $address): ?>
        <?php $m++; ?>
        {
        "id" : "<?php echo $address->getId(); ?>",
        "city" : {
        "id" : "<?php echo $address->getCity()->getId(); ?>",
        "code" : "<?php echo $address->getCity()->getCode(); ?>",
        "name" : "<?php echo $address->getCity()->getName(); ?>",
        "image" : "<?php echo $address->getCity()->getImage(); ?>",
        "slug" : "<?php echo $address->getCity()->getSlug(); ?>
        },
        "address" : "<?php echo $address->getAddress(); ?>",
        "zip-code" : "<?php echo $address->getZipCode(); ?>",
        "phone" : "<?php echo $address->getPhone(); ?>",
        "fax" : "<?php echo $address->getFax(); ?>",
        "mobile" : "<?php echo $address->getMobile(); ?>",
        "slug" : "<?php echo $address->getSlug(); ?>"
        }<?php echo ($count_address == $m ? '' : ','); ?>
    <?php endforeach; ?>    
    ],    
    "photos" : [
    <?php $count_photos = count($obj->getPhotos());
    $j = 0; ?>
    <?php foreach ($obj->getPhotos() as $photo): ?>
        <?php $j++; ?>
        {
        "id" : "<?php echo $photo->getId(); ?>",
        "store" : 
        { 
        "name" : "<?php echo $photo->getStore()->getName(); ?>",
        "slug" : "<?php echo $photo->getStore()->getSlug(); ?>",
        },
        "customer" : 
        { 
        "realname" : "<?php echo $photo->getCustomer()->getRealname(); ?>",
        "slug" : "<?php echo $obj->getCustomer()->getSlug(); ?>",
        },    
        "name" : "<?php echo $photo->getName(); ?>",
        "content" : "<?php echo $photo->getContent(); ?>",
        "path" : "<?php echo $photo->getPath(); ?>",
        "slug" : "<?php echo $photo->getSlug(); ?>"
        }<?php echo ($count_photos == $j ? '' : ','); ?>
    <?php endforeach; ?>],
    "ruc" : "<?php echo $obj->getRuc(); ?>",
    "name" : "<?php echo $obj->getName(); ?>",
    "logo" : "<?php echo $obj->getLogo(); ?>",
    "url" : "<?php echo $obj->getUrl(); ?>",
    "phrase" : "<?php echo $obj->getPhrase(); ?>",
    "info" : "<?php echo $obj->getInfo(); ?>",
    "description" : "<?php echo $obj->getDescription(); ?>",
    "datetime" : "<?php echo $obj->getFormattedDatetime(); ?>",
    "qty-votes" : "<?php echo $obj->getQtyVotes(); ?>",
    "status" : "<?php echo $obj->getStatusStr(); ?>",
    "slug" : "<?php echo $obj->getSlug(); ?>"
    }<?php echo ($count == $i ? '' : ','); ?>
<?php endforeach; ?>
]}