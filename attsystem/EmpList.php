<html>
<head>
<link href="layout.css" rel="stylesheet" type="text/css">
</head>
<title>Mpande Technology</title>
<body style="background-color:#EAE9E9">
<fieldset>
<legend style="color:#858689;text-align:center;font-size:40px;">Employee List</legend>
<?php 
	
$con=mysql_connect("localhost", "group3", "12345");
if(!$con){
	die("Cannot connect: ". mysql_error());
}
mysql_select_db("attsystem",$con);
$sql= "SELECT*FROM employee_detail";
$myData = mysql_query($sql,$con);
echo "<table border=1 cellspacing=0 cellpadding=0 width=auto table align=center>
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
while ($record = mysql_fetch_array($myData)){ //an array to fetch all the records in our table
	echo "<tr>";//we want to echo out the records
	echo "<td>" . $record['EmpID'] . "</td>";//we are entering the data into the table <td> 
	echo "<td>" . $record['EmpName'] . "</td>"; 
	echo "<td>" . $record['EmpAddress'] . "</td>";
	echo "<td>" . $record['EmpMobile'] . "</td>";
	echo "<td>" . $record['EmpEmail'] . "</td>";
	echo "<td>" . $record['EmpBirthdate'] . "</td>";
	echo "<td>" . $record['EmpGroup'] . "</td>";
	echo "<td>" . $record['EmpTechnology'] . "</td>";
	
	echo "</tr>";
}
echo "</table>";

mysql_close($con);

?>

</fieldset>
</body>
</html>