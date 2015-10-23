<?php


// Connect to mysql db at localhost to db ssd
$link = mysqli_connect("localhost", "root", "password", "ssd");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
<<<<<<< HEAD

$first = mysqli_real_escape_string($link, $_POST['nameFirst']);
$last = mysqli_real_escape_string($link, $_POST['nameLast']);
$email = mysqli_real_escape_string($link, $_POST['nameFirst']);
$dpt = mysqli_real_escape_string($link, $_POST['subject']);
$course = mysqli_real_escape_string($link, $_POST['number']);
$crn = mysqli_real_escape_string($link, $_POST['crn']);
$instructor = mysqli_real_escape_string($link, $_POST['instructor']);
$instructor_email = mysqli_real_escape_string($link, $_POST['instructorEmail']);
$notetaker = false;
$assigned = false;

//$email = "sample@vt.edu";

echo $course;

$sql = "INSERT INTO student (FIRSTNAME, LASTNAME, EMAIL, DEPARTMENT, COURSE_NUMBER, CRN, INSTRUCTOR, INSTRUCTOR_EMAIL, IS_NOTETAKER, IS_ASSIGNED) VALUES ('$first', '$last', '$email', '$dpt', '$course', '$crn', '$instructor', '$instructor_email', '$notetaker', '$assigned')";

// attempt insert query execution
=======

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
>>>>>>> server
if(mysqli_query($link, $sql)){
   //echo "Records added successfully.";
} else{
   // echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// close connection
mysqli_close($link);
?>
