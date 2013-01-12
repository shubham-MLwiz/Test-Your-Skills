<?php
session_start();
$role=$_SESSION["role"];
$id1=$_SESSION["id"];
if(!isset($_SESSION["role"]) && $role!="Admin" && $role!='Student' && $role!='Faculty')
{
    header("Location:AuthError.php");
    die();
}
$a2=$_POST["T2"];
$a3=$_POST["T3"];
$a4=$_POST["T4"];
$a5=$_POST["T5"];
$a6=$_POST["T6"];
$a7=$_POST["T7"];
$a8=$_POST["T8"];
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
$id=GenerateId("qbank",1); //User defined Function
$query="insert into qbank values($id,$id1,'$a2','$a3','$a4','$a5','$a6','$a7',$a8)";
mysql_query($query);
$n=  mysql_affected_rows();
if($n>0)
{
    echo "<h1>Your Question id : $id</h1>";
    echo "<br/><a href='RegisterQuestion.php'>Add More</a>";
    if($role=='Faculty') echo "<br/><a href='FacultyHome.php'>Home</a>";
    else if($role=='Student') echo "<br/><a href='UserHome.php'>Home</a>";
    else if($role=='Admin') echo "<br/><a href='AdminHome.php'>Home</a>";
    die();
}
else
{
    echo "Server error: inserting data";
    die();
}
function GenerateId($tablename, $start)
{
    global $cn;
    $query="Select * from $tablename";
    $result=mysql_query($query);
    $n=mysql_num_rows($result);
    $n=$n+$start;
    return $n;
}
?>