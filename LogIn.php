<?php

/*
* Following code will list all the records on the layouts table
*/

$username =$_POST['postusername'];
$password = $_POST['postpassword'];

$user = 'DubaiCollege';
$pass = 'stem123';

if ($username == $user && $password == $pass){
    echo("yes");
}

else{
    echo("no");
}

// // array for JSON response
// $response = array();

// // include db connect class
// require_once __DIR__ . '/db_connect.php';

// // connecting to db
// $db = new DB_CONNECT();




// $sql = ("SELECT * FROM Users WHERE userID =1");

// $result = $db->get_con()->query($sql);

// // check for empty result
// if ($result->num_rows > 0) {
//   // looping through all results
//   $response["Clubs"] = array();

//   while ($row = $result->fetch_assoc()) {
//       // temp user array
//       $record = array();
//       $record["Username"] = $row["Username"];
//       $record["Password"] = $row["Password"];

//       // push single record into final response array
//       array_push($response["Clubs"], $record);
//   }
//   // success
//   $response["success"] = 1;

//   // echoing JSON response
//   echo json_encode($response);
// } else {
//   // no products found
//   $response["success"] = 0;
//   $response["message"] = "No records found";

//   // echo no users JSON
//   echo json_encode($response);
// }
// // Organisers,Students WHERE $table1 AND $table2 AND Students.clubID = Clubs.clubID AND Clubs.clubID = Organisers.clubID AND Students.clubID = Organisers.clubID");
// // // get all products from products table
// // //if ($option == 'clubName'){
// //   //$sql = ("SELECT * FROM Clubs,Organisers WHERE clubName LIKE '%$search%' AND Clubs.clubID = Organisers.clubID");
// // //}
// // //elseif ($option == 'organiser'){
// //   //$sql = ("SELECT * FROM Clubs,Organisers WHERE CONCAT(Organisers.FirstName,' ',Organisers.LastName) LIKE '%$search%' AND Clubs.clubID = Organisers.clubID");
// // //}
// // //elseif ($option == 'Class'){
// //   //$sql = ("SELECT * FROM Clubs,Organisers WHERE Class LIKE '%$search%' AND Clubs.clubID = Organisers.clubID");
// // //}
// // //elseif ($option == 'student'){
// //   //$sql = ("SELECT * FROM Clubs,Students,Organisers WHERE CONCAT(Students.FirstName,' ',Students.LastName) LIKE '%$search%' AND Students.clubID = Clubs.clubID AND Clubs.clubID = Organisers.clubID AND Students.clubID = Organisers.clubID");
// // //}
// // //elseif($option == )

?>
