<?php

/*
 * Following code will list all the records on the layouts table
 */
$option =$_POST['postoption'];
$search = $_POST['postsearch'];

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// get all products from products table
if ($option == 'clubName'){
  $sql = ("SELECT * FROM Clubs,Organisers WHERE clubName LIKE '%$search%' AND Clubs.clubID = Organisers.clubID");
}
elseif ($option == 'organiser'){
  $sql = ("SELECT * FROM Clubs,Organisers WHERE FirstName LIKE '%$search%' AND Clubs.clubID = Organisers.clubID");
}
//elseif($option == )
$result = $db->get_con()->query($sql);

// check for empty result
if ($result->num_rows > 0) {
    // looping through all results
    $response["Clubs"] = array();

    while ($row = $result->fetch_assoc()) {
        // temp user array
        $record = array();
        $record["clubID"] = $row["clubID"];
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
