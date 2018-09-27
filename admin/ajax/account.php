<?php
require_once("../inc/function.php");
$table = 'account_view';
$primaryKey = 'id';
$columns = array(
    array( 'db' => 'name', 'dt' => 0 ),
    array( 'db' => 'email',  'dt' => 1 ),
    array( 'db' => 'phone',   'dt' => 2 ),
    array( 'db' => 'user_type_name',     'dt' => 3 ),
    array(
        'db'        => 'date_created',
        'dt'        => 4,
        'formatter' => function( $d, $row ) {
            return date( 'jS M y', strtotime($d));
        }
    ),
    array(
        'db'        => 'date_modified',
        'dt'        => 5,
        'formatter' => function( $d, $row ) {
            return date( 'jS M y', strtotime($d));
        }
    )
);
$sql_details = array(
    'user' => DB_USER,
    'pass' => DB_PASSWORD,
    'db'   => DB_NAME,
    'host' => DB_HOST
);
require( '../inc/ssp.class.php' );
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);