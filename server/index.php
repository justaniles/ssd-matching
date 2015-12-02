<?php

$server = "localhost";
$user = "root";
$password = "password";
$database = "ssd";

// Connect to database
$connection = mysqli_connect($server, $user, $password, $database);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Read URL to determine if notetaker or requester
$submitted = mysqli_real_escape_string($link, $_GET['c']);
$notetaker = ($submitted == "ProcessVolunteerSubmission") || ($submitted == "ProcessClassVolunteersSubmission");
$assigned = false;


// If the form is submitted by the Professor
if ($submitted == "ProcessClassVolunteersSubmission")
{
	$dpt = mysqli_real_escape_string($link, $_POST['course_name']);
	$course = mysqli_real_escape_string($link, $_POST['course_number']);
	$crn = mysqli_real_escape_string($link, $_POST['course_crn']);
	$instructor = mysqli_real_escape_string($link, $_POST['instructor_name']);
	$instructor_email = mysqli_real_escape_string($link, $_POST['instructor_email']);
	for ($i = 1; $i <= 7; $i++)
	{
		$first = mysqli_real_escape_string($link, $_POST['volunteers[{$i}][volunteer_first_name]']);
		$last = mysqli_real_escape_string($link, $_POST['volunteers[{$i}][volunteer_last_name]']);
		$email = mysqli_real_escape_string($link, $_POST['volunteers[{$i}][volunteer_email]']);

		if (strlen($first) == 0 || strlen($last) == 0 || strlen($email) == 0)
			continue;	

		$sql = "INSERT INTO student (FIRSTNAME, LASTNAME, EMAIL, DEPARTMENT, COURSE_NUMBER, CRN, INSTRUCTOR, INSTRUCTOR_EMAIL, IS_NOTETAKER, IS_ASSIGNED) VALUES ('$first', '$last', '$email', '$dpt', '$course', '$crn', '$instructor', '$instructor_email', '$notetaker', '$assigned')";

		if(mysqli_query($link, $sql)){
	   //echo "Records added successfully.";
		} else{
		   // echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
}
//Student submitted requester for notes/ volunteer for notes
else
{
	$first = mysqli_real_escape_string($link, $_POST['student_first_name']);
	$last = mysqli_real_escape_string($link, $_POST['student_last_name']);


	//WHERE TO GET EMAIL
	$email = mysqli_real_escape_string($link, $_POST['student_first_name']); 

	$email = "pid@vt.edu";

	for ($i = 1; $i <= 7; $i++)
	{
		$dpt = mysqli_real_escape_string($link, $_POST['noteRequests[{$i}][course_name]']);
		$course = mysqli_real_escape_string($link, $_POST['noteRequests[{$i}][course_number]']);
		$crn = mysqli_real_escape_string($link, $_POST['noteRequests[{$i}][course_crn]']);
		$instructor = mysqli_real_escape_string($link, $_POST['noteRequests[{$i}][instructor_name]']);
		$instructor_email = mysqli_real_escape_string($link, $_POST['noteRequests[{$i}][instructor_email]']);

		if (strlen($dpt) == 0 || strlen($course) == 0 || strlen($crn) == 0 || strlen($instructor) == 0 || strlen($instructor_email) == 0)
			continue;	

		$sql = "INSERT INTO student (FIRSTNAME, LASTNAME, EMAIL, DEPARTMENT, COURSE_NUMBER, CRN, INSTRUCTOR, INSTRUCTOR_EMAIL, IS_NOTETAKER, IS_ASSIGNED) VALUES ('$first', '$last', '$email', '$dpt', '$course', '$crn', '$instructor', '$instructor_email', '$notetaker', '$assigned')";

		if(mysqli_query($link, $sql)){
	   //echo "Records added successfully.";
		} else{
		   // echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
}


// close connection
mysqli_close($link);
?>
