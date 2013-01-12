<?php
$id=$_POST["H1"];
$a1=$_POST["T1"];
$a2=$_POST["T2"];
$a3=$_POST["T3"];
$a4=$_POST["T4"];
$cn = mysql_connect("localhost","root","kota");
if(! $cn)
{
	echo "Unable to connect";
	die();
}
$db=mysql_select_db("online_exam",$cn);
if(! $db)
{
	echo "Database does not exist";
	die();
}
$query="Update stdata set name='$a1',branch='$a2',YOAD=$a3,status=$a4 where id=$id";
mysql_query($query);
$n=  mysql_affected_rows();
if($n>0)
{
    echo "<h2>Updated</h2>";
    echo "<a href='AdminHome.php'>Home</a>";
}
else
{
    echo "<h1>Table is locked</h1>";
    echo "<a href='StUpdateForm1.php'>Continue...</a>";
}
?>