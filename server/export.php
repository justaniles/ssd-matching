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

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('First Name', 'Last Name', 'Student Email', 'Department', 'Course Number', 'CRN', 'Instructor', 'Instructor Email', 'Notetaker', 'Assigned to Scholar'));

// fetch the data
$sql = 'SELECT * FROM student';
$rows = mysqli_query($link, $query);

// loop over the rows, outputting them
while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);




mysqli_close($link);
?>
