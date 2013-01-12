<?php
//grab the data from HTTP request
require_once 'DataFunctions.php';
session_start();
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
$a1=$_POST["T1"];
$a2=$_POST["T2"];
$a3=$_POST["T3"];
$a4=$_POST["T4"];
$a5=$_POST["T5"];
$id=GenerateId("logininfo",10001); //User defined Function
$query="insert into stdata values($id,'$a1','$a2',$a3,$a4,'nothing')";
mysql_query($query);
$n=  mysql_affected_rows();
$query1="insert into logininfo values($id,'$a5','Student')";
mysql_query($query1);
$m=  mysql_affected_rows();
if($n>0 && $m>0)
{
    echo "<h4>Registered Successfully...</h4><br/>";
    echo "Your id : $id";
    echo "<br/><br/>";
    echo "Go to <a href='AdminHome.php'>Home</a>";
    die();
}
else
{
    echo "Server error: Unable to insert data";
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