<?php



$servername = "localhost";
$username = "root";
$password = "";
$database = "samarth";


$conn = mysqli_connect($servername, $username, $password,$database);


if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
// else{
//     echo "Connection was successful";
// }
//Adding the data into database.

// $sql = "INSERT INTO user (user_id, firstname, lastname, email,password)
// VALUES ('1', 'Samarth', 'Parasnis', 'sp@gmail.com', 'Abc123')";



// $sql = "INSERT INTO user (firstname, lastname, email,password)
// VALUES ('Sam', 'Parasnis', 'samarth@gmail.com', 'xyz456')";

// if ($conn->query($sql) === TRUE) {
//     // echo "<br >New record created successfully";
//   } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//   }

//   //Deleting the data from database.
//   $sql1 = "DELETE FROM user WHERE user_id=3";

// if ($conn->query($sql1) === TRUE) {
//   // echo "<br>Record deleted successfully";
// } else {
//   echo "<br>Error deleting record: " . $conn->error;
// }

?>
  