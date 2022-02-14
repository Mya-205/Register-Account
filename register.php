<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>



<?php


//Main Code

session_start();//starting session


$fname       = $_POST['fname'];
$lname       = $_POST['lname'];
$age         = $_POST['age'];
$newEmail    = $_POST['newEmail'];
$newPassword = $_POST['newLogin'];
$hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);

//
// Gets all the information for the database
// gets the username
// gets the password
// gets the database name
// attempts to make a connection to the database
//
function getDBConnection() {
    // get connection to MySQL database
    $servername = "localhost";
    $username = "118795";
    $password = "saltaire";
    $dbname = "118795";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

$conn = getDBConnection();

//
$query = "INSERT INTO createAcc (firstname,lastName,age,email,password) VALUES   ('$fname','$lname','$age','$newEmail','$hashed_password')";



if(mysqli_query($conn, $query)){
    echo "Records inserted successfully.";
    header ('Location: welcome.html');
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    header ('Location: register.html');
}

// Close the connection   
 mysqli_close($conn); 






?>