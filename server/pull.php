
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
 
//Get the the radio button if the user wants to see all matched
//unmatched or both
$matched = mysqli_real_escape_string($link, $_POST['match']);
if ($matched == "both")
{
	echo "<h2 style=\"color:green;\">MATCHED TABLE</h2>";
}

if ($matched == "matched" || $matched == "both")
{
	$statement = "SELECT student.DEPARTMENT_S, student.COURSE_S, student.CRN_S, notetaker.FIRSTNAME_N, notetaker.LASTNAME_N, notetaker.EMAIL_N, student.FIRSTNAME_S, student.LASTNAME_S, student.EMAIL_S FROM notetaker JOIN student on notetaker.CRN_N = student.CRN_S";
	$query = mysqli_query($link, $statement);

	echo "<table><tr><td>Department</td><td>Course</td><td>CRN</td><td>Notetaker's First Name</td><td>Notetaker's Last Name</td><td>Notetaker's Email</td><td>Student's First Name</td><td>Student's Last Name</td><td>Student's Email</td></tr>";

	while($row = mysqli_fetch_assoc($query))
	{
	    echo "<tr><td>";
	    echo $row['DEPARTMENT_S'];
	    echo "</td><td>";
	    echo $row['COURSE_S'];
	    echo "</td><td>";
	    echo $row['CRN_S'];
	    echo "</td><td>";
	    echo $row['FIRSTNAME_N'];
	    echo "</td><td>";
	    echo $row['LASTNAME_N'];
	    echo "</td><td>";
	    echo $row['EMAIL_N'];
	    echo "</td><td>";
	    echo $row['FIRSTNAME_S'];
	    echo "</td><td>";
	    echo $row['LASTNAME_S'];
	    echo "</td><td>";
	    echo $row['EMAIL_S'];
	    echo "</td></tr>";
	}
	echo "</table>";
}

if ($matched == "both")
{
	echo "<h2 style=\"color:red;\">UNMATCHED TABLE</h2>";
}

if ($matched == "unmatched" || $matched == "both")
{
	$statement = "SELECT  student.DEPARTMENT_S, student.COURSE_S, student.CRN_S, student.FIRSTNAME_S, student.LASTNAME_S, student.EMAIL_S FROM notetaker RIGHT JOIN student on notetaker.CRN_N = student.CRN_S WHERE notetaker.FIRSTNAME_N IS NULL";
	$query = mysqli_query($link, $statement);

	echo "<table><tr><td>Department</td><td>Course</td><td>CRN</td><td>Student's First Name</td><td>Student's Last Name</td><td>Student's Email</td></tr>";

	while($row = mysqli_fetch_assoc($query))
	{
	    echo "<tr><td>";
	    echo $row['DEPARTMENT_S'];
	    echo "</td><td>";
	    echo $row['COURSE_S'];
	    echo "</td><td>";
	    echo $row['CRN_S'];
	    echo "</td><td>";
	    echo $row['FIRSTNAME_S'];
	    echo "</td><td>";
	    echo $row['LASTNAME_S'];
	    echo "</td><td>";
	    echo $row['EMAIL_S'];
	    echo "</td></tr>";
	}
	echo "</table>";
}



 
// close connection
mysqli_close($link);
?>






