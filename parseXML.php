<?php 
        echo '<pre>';
    include './config.php';
    $xmlString = file_get_contents('./addresses.xml');
    $xml = new SimpleXMLElement($xmlString);
    foreach ($xml -> addresses as $key => $value) {
        $sql = "INSERT INTO addresses  (id,address,street,street_name,street_type,adm,adm1,adm2,cord_y,cord_x)
        VALUES ('" . $value -> addresses_id . "','" . $value -> addresses_address . "','" . $value -> addresses_street . "','" . $value -> addresses_street_name . "','" . $value -> addresses_street_type . "','" . $value -> addresses_adm . "','" . $value -> addresses_adm1 . "','" . $value -> addresses_adm2 . "','" . $value -> addresses_cord_y . "','" . $value -> addresses_cord_x . "') ; ";
        $result = mysqli_query($db,$sql);
    }
    if ($result == "true") {
		
	echo "stacvav";
	
	}
	else {
		echo "chexav";
	}
    