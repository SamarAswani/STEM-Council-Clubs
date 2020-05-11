<?php

/*
* Following code will list all the records on the layouts table
*/

$update = $_POST['postupdate'];
$club = $_POST['postclub'];
$attribute = $_POST['postAttribute'];

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();


// get all products from products table
if ($attribute == 'clubName'){
  $sql = ("UPDATE Clubs SET clubName = '$update' WHERE clubName LIKE '%$club%'");
}
elseif ($attribute == 'Class'){
  $sql = ("UPDATE Clubs SET Class = '$update' WHERE clubName LIKE '%$club%'");
}
elseif ($attribute == 'FirstName'){
  $sql = ("UPDATE Organisers,Clubs SET Organisers.FirstName = '$update' WHERE (SELECT clubID FROM Clubs WHERE clubName LIKE '%$club%') = Organisers.clubID");
}
elseif ($attribute == 'LastName'){
  $sql = ("UPDATE Organisers,Clubs SET Organisers.LastName = '$update' WHERE (SELECT clubID FROM Clubs WHERE clubName LIKE '%$club%') = Organisers.clubID");
}
//elseif($option == )

$result = $db->get_con()->query($sql);

?>
