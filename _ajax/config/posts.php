<?php

// DB table to use
$table = 'd_demo';

// Table's primary key
$primaryKey = 'd_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array('db' => 'd_first_title', 'dt' => 0),
    array('db' => 'd_last_title', 'dt' => 1),
    array('db' => 'd_position', 'dt' => 2),
    array('db' => 'd_office', 'dt' => 3),
    array(
        'db' => 'd_date',
        'dt' => 4,
        'formatter' => function( $d, $row ) {
            return dt_date($d);
        }
    ),
    array(
        'db' => 'd_salary',
        'dt' => 5,
        'formatter' => function( $d, $row ) {
            return '$' . number_format($d);
        }
    ),
    array(
        'db' => 'd_id',
        'dt' => 6,
        'formatter' => function( $d, $row ) {
            $Data = [
                'title' => 'Post',
                'route' => 'posts',
                'create' => 'create',
                'id' => $d,
                'callback' => 'Posts',
                'action' => 'remove',
            ];

            return dt_actions($Data);
        }
    )
);
