
<head>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<?php

// Connect to mysql db at localhost to db ssd
$link = mysqli_connect("localhost", "root", "password", "ssd");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$statement = "SELECT * FROM student ORDER BY student.CRN, student.COURSE_NUMBER";
$query = mysqli_query($link, $statement);

$prevCRN = -1;
$department = '';
$course = '';
$crn = '';
$instructor = '';
$instructor_email = '';
$requesters = [];
$notetakers = [];
$classes = [];


while($row = mysqli_fetch_assoc($query))
{
	$crn = $row['CRN'];
	
	//first call
	if ($prevCRN == -1)
	{
		$prevCRN = $crn;
		$department = $row['DEPARTMENT'];
		$course = $row['COURSE_NUMBER'];
		$instructor = $row['INSTRUCTOR'];
		$instructor_email = $row['INSTRUCTOR_EMAIL'];

		$is_notetaker = $row['IS_NOTETAKER'];
		$newstudent = array('firstName' => $row['FIRSTNAME'], 'lastName' => $row['LASTNAME'], 'email' => $row['EMAIL']);

		//if is a requester, add to requester list
		if ($is_notetaker == "0")
		{
			array_push($requesters, $newstudent);
		}
		else
		{
			array_push($notetakers, $newstudent);
		}
	}
	//new crn
	else if ($prevCRN != $crn)
	{
		$class = array('crn' => $prevCRN, 'department' => $department, 'courseNumber' => $course, "instructor" => $instructor, "instructorEmail" => $instructor_email, 'requesters' => $requesters, 'notetakers' => $notetakers);

		array_push($classes, $class);

		unset($requesters);
		unset($notetakers);

		$requesters = [];
		$notetakers = [];

		$prevCRN = $crn;
		$department = $row['DEPARTMENT'];
		$course = $row['COURSE_NUMBER'];
		$instructor = $row['INSTRUCTOR'];
		$instructor_email = $row['INSTRUCTOR_EMAIL'];

		$is_notetaker = $row['IS_NOTETAKER'];
		$newstudent = array('firstName' => $row['FIRSTNAME'], 'lastName' => $row['LASTNAME'], 'email' => $row['EMAIL']);

		//if is a requester, add to requester list
		if ($is_notetaker == "0")
		{
			array_push($requesters, $newstudent);
		}
		else
		{
			array_push($notetakers, $newstudent);
		}
	}
	//same crn
	else
	{
		$is_notetaker = $row['IS_NOTETAKER'];
		$newstudent = array('firstName' => $row['FIRSTNAME'], 'lastName' => $row['LASTNAME'], 'email' => $row['EMAIL']);

		//if is a requester, add to requester list
		if ($is_notetaker == '0')
		{
			array_push($requesters, $newstudent);
		}
		else
		{
			array_push($notetakers, $newstudent);
		}
	}
}

$class = array('crn' => $prevCRN, 'department' => $department, 'courseNumber' => $course, "instructor" => $instructor, "instructorEmail" => $instructor_email, 'requesters' => $requesters, 'notetakers' => $notetakers);
array_push($classes, $class);

//$string = str_replace("\"","\\\"", json_encode($classes));
$string = json_encode($classes);
echo $string; 

// close connection
mysqli_close($link);

?>






