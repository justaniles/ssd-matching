<?php

//Gets the student information 
$first = $_GET["firstname"];
$last = $_GET["lastname"];
$email = $_GET["email"];
$dpt = $_GET["department"];
$course = $_GET["courseNumber"];
$crn = $_GET["crn"];
$instr = $_GET["instructor"];
$instr_email = $_GET["instructorEmail"];
$notetaker = $_GET["isNotetaker"];
$assigned = $_GET["isAssigned"];

// Connect to mysql db at localhost to db ssd
$link = mysqli_connect("localhost", "root", "password", "ssd");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//update the right person
$query = 'UPDATE student SET student.IS_ASSIGNED ="' . ($assigned) . '"';
$query .= 'WHERE student.FIRSTNAME = "' . ($first) . '"';
$query .= 'AND student.LASTNAME = "' . ($last) . '"';
$query .= 'AND student.EMAIL = "' . ($email) . '"';
$query .= 'AND student.DEPARTMENT = "' . ($dpt) . '"';
$query .= 'AND student.COURSE_NUMBER = "' . ($course) . '"';
$query .= 'AND student.CRN = "' . ($crn) . '"';
$query .= 'AND student.INSTRUCTOR = "' . ($instr) . '"';
$query .= 'AND student.INSTRUCTOR_EMAIL = "' . ($instr_email) . '"';
$query .= 'AND student.IS_NOTETAKER = "' . ($notetaker) . '"';

if (mysqli_query($link, $query)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($link);
?>

