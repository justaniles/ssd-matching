<?php

//Server connection parameters
$server = "localhost";
$user = "root";
$password = "password";
$database = "ssd";

// Connect to server
$link = mysqli_connect($server, $user, $password, $database);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$query = "truncate table student";

if (mysqli_query($link, $query)) {
    echo "Table cleared.";
} else {
    echo "Error clearing table: " . mysqli_error($conn);
}

?>
