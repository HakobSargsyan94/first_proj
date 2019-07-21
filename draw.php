<?php 
    include './config.php';
    $id = $_POST[ 'id' ];
    function distance($lat1, $lon1, $lat2, $lon2 ) {
          if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
          } else {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            return ($miles * 1.609344);
          }
    }


    $sql = "SELECT * FROM `addresses` WHERE `id` = $id ; ";
    $query = mysqli_query( $db , $sql );
    $row = mysqli_fetch_assoc( $query );
    $cordX = $row[ 'cord_x' ];
    $cordY = $row[ 'cord_y' ];



    $sql = "SELECT * FROM `addresses` WHERE `id` != $id LIMIT 200 ; ";
    $query = mysqli_query( $db , $sql );
    $response = [];
    while ( $row = mysqli_fetch_assoc( $query ) ) {
        $row[ 'distance' ] = distance( $cordX , $cordY , $row[ 'cord_x' ] , $row[ 'cord_y' ] );
        $response[] = $row;
    }

    // var_dump($response);
    exit( json_encode( $response ) );
