<?php

/*
* Following code will list all the records on the layouts table
*/

$option1 =$_POST['postoption1'];
$search1 = $_POST['postsearch1'];
$option2 =$_POST['postoption2'];
$search2 = $_POST['postsearch2'];

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

if ($option1 == 'clubName'){
  $table1 = "Clubs.clubName LIKE '%$search1%'";
}
elseif ($option1 == 'organiser'){
  $table1 = "(CONCAT(Organisers.FirstName,' ',Organisers.LastName) LIKE '%$search1%')";
}
elseif ($option1 == 'Class'){
  $table1 = "Clubs.Class LIKE '%$search1%'";
}
elseif ($option1 == 'student'){
  $table1 = "(CONCAT(Students.StudentFirstName,' ',Students.StudentLastName) LIKE '%$search1%')";
}

if ($option2 == 'clubName'){
  $table2 = "Clubs.clubName LIKE '%$search2%'";
}
elseif ($option2 == 'organiser'){
  $table2 = "(CONCAT(Organisers.FirstName,' ',Organisers.LastName) LIKE '%$search2%')";
}
elseif ($option2 == 'Class'){
  $table2 = "Clubs.Class LIKE '%$search2%'";
}
elseif ($option2 == 'student'){
  $table2 = "(CONCAT(Students.StudentFirstName,' ',Students.StudentLastName) LIKE '%$search2%')";
}


$sql = ("SELECT * FROM Clubs,Organisers,Students WHERE $table1 AND $table2 AND Students.clubID = Clubs.clubID AND Clubs.clubID = Organisers.clubID AND Students.clubID = Organisers.clubID");
// get all products from products table
//if ($option == 'clubName'){
  //$sql = ("SELECT * FROM Clubs,Organisers WHERE clubName LIKE '%$search%' AND Clubs.clubID = Organisers.clubID");
//}
//elseif ($option == 'organiser'){
  //$sql = ("SELECT * FROM Clubs,Organisers WHERE CONCAT(Organisers.FirstName,' ',Organisers.LastName) LIKE '%$search%' AND Clubs.clubID = Organisers.clubID");
//}
//elseif ($option == 'Class'){
  //$sql = ("SELECT * FROM Clubs,Organisers WHERE Class LIKE '%$search%' AND Clubs.clubID = Organisers.clubID");
//}
//elseif ($option == 'student'){
  //$sql = ("SELECT * FROM Clubs,Students,Organisers WHERE CONCAT(Students.FirstName,' ',Students.LastName) LIKE '%$search%' AND Students.clubID = Clubs.clubID AND Clubs.clubID = Organisers.clubID AND Students.clubID = Organisers.clubID");
//}
//elseif($option == )
$result = $db->get_con()->query($sql);

// check for empty result
if ($result->num_rows > 0) {
   // looping through all results
   $response["Clubs"] = array();

   while ($row = $result->fetch_assoc()) {
       // temp user array
       $record = array();
       $record["clubName"] = $row["clubName"];
       $record["Class"] = $row["Class"];
       $record["FirstName"] = $row["FirstName"];
       $record["LastName"] = $row["LastName"];

       // push single record into final response array
       array_push($response["Clubs"], $record);
   }
   // success
   $response["success"] = 1;

   // echoing JSON response
   echo json_encode($response);
} else {
   // no products found
   $response["success"] = 0;
   $response["message"] = "No records found";

   // echo no users JSON
   echo json_encode($response);
}
?>
