<?php

/*
* Following code will list all the records on the layouts table
*/

$clubName =$_POST['postclubName'];
$FirstName =$_POST['postfirstName'];
$LastName = $_POST['postlastName'];
$form = $_POST['postForm'];

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();




$sql = ("INSERT INTO Students(StudentFirstName,StudentLastName,Form,clubID) VALUES ('$FirstName','$LastName','$form',(SELECT clubID FROM Clubs WHERE clubName LIKE '$clubName'))");

// Organisers,Students WHERE $table1 AND $table2 AND Students.clubID = Clubs.clubID AND Clubs.clubID = Organisers.clubID AND Students.clubID = Organisers.clubID");
// // get all products from products table
// //if ($option == 'clubName'){
//   //$sql = ("SELECT * FROM Clubs,Organisers WHERE clubName LIKE '%$search%' AND Clubs.clubID = Organisers.clubID");
// //}
// //elseif ($option == 'organiser'){
//   //$sql = ("SELECT * FROM Clubs,Organisers WHERE CONCAT(Organisers.FirstName,' ',Organisers.LastName) LIKE '%$search%' AND Clubs.clubID = Organisers.clubID");
// //}
// //elseif ($option == 'Class'){
//   //$sql = ("SELECT * FROM Clubs,Organisers WHERE Class LIKE '%$search%' AND Clubs.clubID = Organisers.clubID");
// //}
// //elseif ($option == 'student'){
//   //$sql = ("SELECT * FROM Clubs,Students,Organisers WHERE CONCAT(Students.FirstName,' ',Students.LastName) LIKE '%$search%' AND Students.clubID = Clubs.clubID AND Clubs.clubID = Organisers.clubID AND Students.clubID = Organisers.clubID");
// //}
// //elseif($option == )
$result = $db->get_con()->query($sql);


?>
