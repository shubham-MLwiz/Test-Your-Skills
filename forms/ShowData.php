<?php
session_start();
require_once "DataFunctions.php";
if(!isset($_SESSION["role"]))
{
    header("Location:AuthError.php");
    die();
}
$role=$_SESSION["role"];
$id1=$_SESSION["id"];
if($role!="Admin")
{
    header("Location:AuthErrorAdmin.php");
    die();
}
?>
<html><body>
<h1>All the students</h1>
<?php
$query="Select * from stdata";
$result=mysql_query($query);
$n=mysql_num_rows($result);
if($n>0)
{
?>
<table border="5" bordercolordark="red" bordercolorlight="blue" width="50%">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Branch</th>
        <th>YOAD</th>
        <th>Status</th>
    </tr>
<?php
    while($rw=  mysql_fetch_array($result))
    {
        $a1=$rw["id"];
        $a2=$rw["name"];
        $a3=$rw["branch"];
        $a4=$rw["YOAD"];
        $a5=$rw["status"];
        echo "<tr>";
        echo "<td>$a1</td>";
        echo "<td>$a2</td>";
        echo "<td>$a3</td>";
        echo "<td>$a4</td>";
        echo "<td>$a5</td>";
        echo "</tr>";
    }
    echo "</table>";
}
else
{
	echo "Data not found";
	die();
}
?>
    <br/>
<a href="AdminHome.php">Back</a>
</body>
</html>