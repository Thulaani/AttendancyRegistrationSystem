<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Search Contacts</title>
<style type="text/css" media="screen">
ul li{
  list-style-type:none;
}
</style>
</head>

<body>
<h3>Search Details</h3>
<p>You may search either by first or last name</p>
<form method="post" action="search_byletter.php?go" id="searchform">
<input type="text" name="name">
<input type="submit" name="submit" value="Search">
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
while($row=mysql_fetch_array($result)){

	$FirstName =$row['FirstName'];
	$LastName=$row['LastName'];
	@$Email=$row['Email'];
	@$PhoneNumber=$row['PhoneNumber'];
	$ID=$row['ID'];
		
//-display the result of the array

echo "<ul>\n"; 
echo "<li>"   .$FirstName . " 	" . $LastName . " 	" . $Email . " 	" . $PhoneNumber . "</a></li>\n";
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
</body>
</html>
