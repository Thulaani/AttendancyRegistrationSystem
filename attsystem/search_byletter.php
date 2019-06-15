<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="layout.css" rel="stylesheet">
<title>Search Contacts</title>
</head>
<body style="background-color:#EAE9E9">
<div class="container">
<center>
<div class="header">
<h3>Search Details</h3>
<p>You may search either by First/Last Name</p>
</div>
<form method="post" action="search_byletter.php?go" id="searchform">
<input type="text" name="name" class="Tfield">
<input type="submit" name="submit" value="Search" class="button">
<a href="index.php">Back</a>
</form>

<?php
'aspx';

if(isset($_POST['submit'])){
if(isset($_GET['go'])){
if(preg_match("/[A-Z | a-z]+/", $_POST['name'])){
$name=$_POST['name'];

//connect to the database
$db=mysql_connect ("localhost", "group3", "12345") 
or die ('I cannot connect to the database because: ' . mysql_error()); 

//-select the database to use
$mydb=mysql_select_db("attsystem");
$EmpID="";
$EmpName="";
$EmpAddress="";
$EmpMobile="";
$EmpEmail="";
$EmpBirthdate="";
$EmpGroup="";
$EmpTechnology="";

//-query the database table
$sql="SELECT EmpID, EmpName, EmpAddress, EmpMobile, EmpEmail , EmpBirthdate, EmpGroup, EmpTechnology
FROM employee_detail WHERE EmpID LIKE '%" . $name . "%' OR EmpName LIKE '%" . $name ."%'";

//-run the query against the mysql query function
$result=mysql_query($sql);

//-count results

$numrows=mysql_num_rows($result);

echo "<p>" .$numrows . " results found for " . stripslashes($name) . "</p>"; 

//-create while loop and loop through result set
echo "<table border=1 cellspacing=0 cellpadding=0 width=auto >
<tr>
<th>EmpID</th>
<th>EmpName</th>
<th>EmpAddress</th>
<th>EmpMobile</th>
<th>EmpEmail</th>
<th>EmpBirthdate</th>
<th>EmpGroup</th>
<th>EmpTechnology</th>
</tr>";
while($row=mysql_fetch_array($result)){


    $EmpID =$row['EmpID'];
	$EmpName=$row['EmpName'];
	$EmpAddress=$row['EmpAddress'];
	$EmpMobile=$row['EmpMobile'];
	$EmpEmail =$row['EmpEmail'];
	$EmpBirthdate=$row['EmpBirthdate'];
	$EmpGroup=$row['EmpGroup'];
	$EmpTechnology=$row['EmpTechnology'];
	$ID=$row['EmpID'];
		
//-display the result of the array

 echo "<tr>";
	  
	  echo"<td>".$EmpID."</td><td>".$EmpName."</td><td>".$EmpAddress."</td><td>".$EmpMobile."</td>
	  <td>".$EmpEmail."</td><td>".$EmpBirthdate."</td><td>".$EmpGroup."</td><td>".$EmpTechnology."</td>";
    echo "</tr>";
	//commented out the search.php aspx?id
echo "</ul>";
}
}
else{
echo "<p>Please enter a query</p>";
}
}
}

if(isset($_GET['by'])){
$letter=$_GET['by'];

//connect to the database
$db=mysql_connect ("localhost", "boss", "tavonga1") 
or die ('I cannot connect to the database because: ' . mysql_error()); 

//-select the database to use
$mydb=mysql_select_db("attendance");

//-query the database table
$sql="SELECT EmpID, EmpName, EmpAddress, EmpMobile, EmpEmail , EmpBirthdate, EmpGroup, EmpTechnology
FROM employee_detail WHERE EmpID LIKE '%" . $letter . "%' OR EmpName LIKE '%" . $letter ."%'";


//-run the query against the mysql query function
$result=mysql_query($sql); 

//-count results
$numrows=mysql_num_rows($result);

echo "<p>" .$numrows . " results found for " . $letter . "</p>"; 

//-create while loop and loop through result set
while($row=mysql_fetch_array($result)){

    $EmpID =$row['EmpID'];
	$EmpName=$row['EmpName'];
	$EmpAddresss=$row['EmpAddress'];
	$EmpMobile=$row['EmpMobile'];
	$EmpRmail =$row['EmpEmail'];
	$EmpBirthdate=$row['EmpBirthdate'];
	$EmpGroup=$row['EmpGroup'];
	$EmpTechnology=$row['EmpTechnology'];
	$ID=$row['EmpID'];
//-display the result of the array

echo "<ul>\n"; 
echo "<li>" . "<a href=\"search.aspx?id=$ID\">"  .$EmpID . " " . $EmpName . " </a></li>\n";
echo "</ul>";
}
}
?>
</center>
</body>
</html>
