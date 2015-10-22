<?php


// Connect to mysql db at localhost to db ssd
$link = mysqli_connect("localhost", "root", "password", "ssd");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_POST['firstname']);
$last_name = mysqli_real_escape_string($link, $_POST['lastname']);
$dpt = mysqli_real_escape_string($link, $_POST['dpt']);
$course = mysqli_real_escape_string($link, $_POST['course']);
$crn = mysqli_real_escape_string($link, $_POST['crn']);
$email = mysqli_real_escape_string($link, $_POST['email']); 

//If any field is empty, don't post
if (strlen($first_name) == 0 || strlen($last_name) == 0 || strlen($dpt) == 0 || strlen($course) == 0 || strlen($crn) == 0 || strlen($email) == 0)
{
	mysqli_close($link);
	return;
}


$table = 'notetaker';



// attempt insert query execution
$sql = "INSERT INTO $table (FIRSTNAME_N, LASTNAME_N, DEPARTMENT_N, COURSE_N, CRN_N, EMAIL_N) VALUES ('$first_name', '$last_name', '$dpt', '$course', '$crn', '$email')";
if(mysqli_query($link, $sql)){
   //echo "Records added successfully.";
} else{
   // echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>
