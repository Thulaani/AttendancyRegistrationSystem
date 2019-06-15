<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="layout.css" rel="stylesheet">
<title>Search Contacts</title>
</head>
<body>
<div class="container">
<center>
<h3>Search Details</h3>
<p>You may search either by First/Last Name</p>
<form method="post" action="search_byletter.php?go" id="searchform">
<input type="text" name="name" class="Tfield">
<input type="submit" name="submit" value="Search" class="button">
</form>

<?php
'aspx';

if(isset($_POST['submit'])){
if(isset($_GET['go'])){
if(preg_match("/[A-Z | a-z]+/", $_POST['name'])){
$name=$_POST['name'];

//connect to the database
$db=mysql_connect ("localhost", "root", "tavonga1") 
or die ('I cannot connect to the database because: ' . mysql_error()); 

//-select the database to use
$mydb=mysql_select_db("asearch");

//-query the database table
$sql="SELECT ID, FirstName, LastName, Email, PhoneNumber FROM a_search WHERE FirstName LIKE '%" . $name . "%' OR LastName LIKE '%" . $name ."%'";

//-run the query against the mysql query function
$result=mysql_query($sql);

//-count results

$numrows=mysql_num_rows($result);

echo "<p>" .$numrows . " results found for " . stripslashes($name) . "</p>"; 

//-create while loop and loop through result set
echo "<table border=1 cellspacing=0 cellpadding=0 width=100% >
<tr>
<th>ID</th>
<th>FirstName</th>
<th>LastName</th>
<th>Email</th>
<th>PhoneNumber</th>
</tr>";
while($row=mysql_fetch_array($result)){

	$FirstName =$row['FirstName'];
	$LastName=$row['LastName'];
	@$Email=$row['Email'];
	@$PhoneNumber=$row['PhoneNumber'];
	$ID=$row['ID'];
		
//-display the result of the array

 echo "<tr>";
	  
	  echo"<td>".$ID."</td><td>".$FirstName."</td><td>".$LastName."</td><td>".$Email."</td><td>".$PhoneNumber."</td>";
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
$db=mysql_connect ("localhost", "root", "tavonga1") 
or die ('I cannot connect to the database because: ' . mysql_error()); 

//-select the database to use
$mydb=mysql_select_db("asearch");

//-query the database table
$sql="SELECT ID, FirstName, LastName FROM a_search WHERE FirstName LIKE '%" . $letter . "%' OR LastName LIKE '%" . $letter ."%'";


//-run the query against the mysql query function
$result=mysql_query($sql); 

//-count results
$numrows=mysql_num_rows($result);

echo "<p>" .$numrows . " results found for " . $letter . "</p>"; 

//-create while loop and loop through result set
while($row=mysql_fetch_array($result)){

$FirstName =$row['FirstName'];
	$LastName=$row['LastName'];
	$ID=$row['ID'];
	
//-display the result of the array

echo "<ul>\n"; 
echo "<li>" . "<a href=\"search.aspx?id=$ID\">"  .$FirstName . " " . $LastName . " </a></li>\n";
echo "</ul>";
}
}
?>
</center>
</body>
</html>
