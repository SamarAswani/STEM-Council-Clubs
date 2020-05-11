<?php

/*
* Following code will list all the records on the layouts table
*/
$club = $_POST['postclub'];


// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// get all products from products table
// $sql = ("DELETE FROM Clubs WHERE clubName = '%$club%'");
// $sql = ("DELETE FROM Clubs WHERE clubName = '%$club%';");
$sql = ("DELETE FROM Organisers WHERE (SELECT Clubs.clubID FROM Clubs WHERE clubName = '$club') = Organisers.clubID;");
$sql .= ("DELETE FROM Students WHERE (SELECT Clubs.clubID FROM Clubs WHERE clubName = '$club') = Students.clubID;");
$sql .= ("DELETE FROM Clubs WHERE clubName = '$club'");


//elseif($option == )
$result = $db->get_con()->multi_query($sql);
?>
