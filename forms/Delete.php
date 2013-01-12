<html><body>
<h1>All the students</h1>
<?php
require_once "DataFunctions.php";
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
    <form action="Delete1.php" method="POST">
<input type="submit" name="B1" value="Delete" /><br/><br/>
    </form>
<a href="AdminHome.php">Back</a>
</body>
</html>