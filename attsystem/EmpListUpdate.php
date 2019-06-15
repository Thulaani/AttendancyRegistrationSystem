<html>
<head>
<link href="layout.css" rel="stylesheet" type="text/css/">

<title>Mpande Technology</title>
</head>
<body style="background-color:#EAE9E9">
<style>
td{
font-size:18px;
}
</style>
<fieldset>
<legend style="color:#858689;text-align:center;font-size:40px;">Employee List Update</legend>

<?php 
	
$conn=mysql_connect("localhost", "group3", "12345");
if(!$conn){
	die("Cannot connect: ". mysql_error());
}
mysql_select_db("attsystem",$conn);

if (isset($_POST['update'])){
	$UpdateQuery= "UPDATE employee_detail SET EmpID='$_POST[empid]', EmpName='$_POST[empname]', EmpAddress='$_POST[empaddress]',
	EmpMobile='$_POST[empmobile]', EmpEmail='$_POST[empemail]', EmpTechnology='$_POST[emptechnology]' WHERE EmpID= '$_POST[hidden]'";/*we have taken regnumber as our P.key take note 
				of that and the updatequery is going tohold all he changes that we are going to make and press the update button*/
	mysql_query($UpdateQuery, $conn);//now we connect our update to our database
}

if (isset($_POST['delete'])){
	$DeleteQuery = "DELETE FROM employee_detail WHERE EmpID='$_POST[hidden]'";//this is where the delete query is running from
	mysql_query($DeleteQuery, $conn);
}

$sql=mysql_query("SELECT*FROM employee_detail order by EmpName");

if($sql===False){
	die(mysql_error());
}
echo "<table border=1  cellspacing=0 cellpadding=0 width=auto table align=center>
<tr>
<th>EmpID</th>
<th>EmpName</th>
<th>EmpAddress</th>
<th>EmpMobile</th>
<th>EmpEmail</td>
<th>EmpTechnology</th>

</tr>";

while ($record = mysql_fetch_array($sql)){ //an array to fetch all the records in our table
	echo "<form action=EmpListUpdate.php method=post>";//we are creatig a form so that all our records each n evry record will be in its form
	echo "<tr>";//we want to echo out the records
	echo "<td>" . "<input type=text class=Tfield name=empid value=" . $record['EmpID'] . " </td>"; //take note in this example we are using name as our p.key
	echo "<td>" . "<input type=text class=Tfield name=empname value=" . $record['EmpName'] . " </td>"; 
	echo "<td>" . "<input type=text class=Tfield name=empaddress value=" .$record['EmpAddress'] . " </td>"; 
	echo "<td>" . "<input type=text class=Tfield name=empmobile value=" . $record['EmpMobile'] . " </td>";
	echo "<td>"	. "<input type=text class=Tfield name=empemail value=" . $record['EmpEmail'] . " </td>";	
	echo "<td>" . "<input type=text class=Tfield name=emptechnology value=" . $record['EmpTechnology'] . " </td>";
	echo "<td>" . "<input type=hidden name=hidden value=" . $record['EmpID'] . " </td>";/*incase our p.key is changed 
	this column will keep the original data*/
	echo "<td>" . "<input type=submit class=button name=update value=update>" . " </td>";
	echo "<td>" . "<input type=submit class=button name=delete value=delete>" . " </td>";
	echo "</tr>";
	echo "</form>";
}
echo "<form action=EmpListUpdate.php method=post>";
echo "<tr>";
echo "<td><input type=text name=empid></td>";//uname is fo uppdate name
echo "<td><input type=text name=empname></td>";//this section is for updating our table infor.
echo "<td><input type=text name=empaddress></td>";
echo "<td><input type=text name=empmobile></td>";
echo "<td><input type=text name=empemail></td>";
echo "<td><input type=text name=emptechnology></td>";
echo "</tr>";
echo "</form>";
echo "</table>";
mysql_close($conn);

?>

</fieldset>

</body>
</html>