<?php
header('Access-Control-Allow-Origin: *');
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header("Content-Type:text/xml");
?>
<stores>
    <?php foreach ($pager->getResults() as $obj): ?>
        <store>
            <id><?php echo $obj->getId(); ?></id>
            <customer>
                <realname><?php echo $obj->getCustomer()->getRealname(); ?></realname>
                <username><?php echo $obj->getCustomer()->getUsername(); ?></username>
                <email><?php echo $obj->getCustomer()->getEmail(); ?></email>
                <picture><?php echo $obj->getCustomer()->getPicture(); ?></picture>
                <slug><?php echo $obj->getCustomer()->getSlug(); ?></slug>
            </customer>
            <categories>
                <?php foreach ($obj->getCategories() as $category): ?>
                    <category>
                        <id><?php echo $category->getId(); ?></id>
                        <name><?php echo $category->getName(); ?></name>
                        <slug><?php echo $category->getSlug(); ?></slug>
                    </category>
                <?php endforeach; ?>
            </categories>
            <services>
                <?php foreach ($obj->getServices() as $service): ?>
                    <service>
                        <id><?php echo $service->getId(); ?></id>
                        <name><?php echo $service->getName(); ?></name>
                        <slug><?php echo $service->getSlug(); ?></slug>
                    </service>
                <?php endforeach; ?>
            </services>    
            <addresses>
                <?php foreach ($obj->getAddresses() as $address): ?>
                    <address>
                        <id><?php echo $address->getId(); ?></id>
                        <city>
                            <id><?php echo $address->getCity()->getId(); ?></id> 
                            <code><?php echo $address->getCity()->getCode(); ?></code> 
                            <name><?php echo $address->getCity()->getName(); ?></name> 
                            <image><?php echo $address->getCity()->getImage(); ?></image>
                            <slug><?php echo $address->getCity()->getSlug(); ?></slug> 
                        </city>
                        <address><?php echo $address->getAddress(); ?></address>
                        <zip-code><?php echo $address->getZipCode(); ?></zip-code>
                        <phone><?php echo $address->getPhone(); ?></phone>
                        <fax><?php echo $address->getFax(); ?></fax>
                        <mobile><?php echo $address->getMobile(); ?></mobile>
                        <slug><?php echo $address->getSlug(); ?></slug>
                    </address>
                <?php endforeach; ?>
            </addresses>            
            <photos>
                <?php foreach ($obj->getPhotos() as $photo): ?>
                    <photo>
                        <id><?php echo $photo->getId(); ?></id>
                        <store>        
                            <name><?php echo $photo->getStore()->getName(); ?></name>
                            <slug><?php echo $photo->getStore()->getSlug(); ?></slug>
                        </store>
                        <customer>
                            <realname><?php echo $photo->getCustomer()->getRealname(); ?></realname>
                            <slug><?php echo $photo->getCustomer()->getSlug(); ?></slug>
                        </customer>                        
                        <name><?php echo $photo->getName(); ?></name>
                        <content><?php echo $photo->getName(); ?></content>
                        <path><?php echo $photo->getPath(); ?></path>
                        <slug><?php echo $photo->getSlug(); ?></slug>
                    </photo>
                <?php endforeach; ?>
            </photos>      
            <ruc><?php echo $obj->getRuc(); ?></ruc>
            <name><?php echo $obj->getName(); ?></name>
            <logo><?php echo $obj->getLogo(); ?></logo>
            <url><?php echo $obj->getUrl(); ?></url>
            <phrase><?php echo $obj->getPhrase(); ?></phrase>
            <info><?php echo $obj->getInfo(); ?></info>
            <description><?php echo $obj->getDescription(); ?></description>
            <datetime><?php echo $obj->getFormattedDatetime(); ?></datetime>
            <qty-votes><?php echo $obj->getQtyVotes(); ?></qty-votes>
            <status><?php echo $obj->getStatusStr(); ?></status>
            <slug><?php echo $obj->getSlug(); ?></slug>
        </store>
    <?php endforeach; ?>
</stores>