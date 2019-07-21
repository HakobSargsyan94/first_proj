<?php 
    include './config.php';
    $q = $_GET[ 'q' ];
    $sql = "SELECT * FROM `addresses` WHERE `street` LIKE '%" . $q . "%' OR `street_name`  LIKE '%" . $q . "%' LIMIT 25 ; ";
    $query = mysqli_query( $db , $sql );
    $response = [];
    while ( $row = mysqli_fetch_assoc( $query ) ) {
    	$response[] = [
    		'id' => $row[ 'id' ],
    		'text' => $row[ 'street' ],
    	];
    }
    exit( json_encode( $response ) );
?>