<?php
session_start();
require_once 'DataFunctions.php';
$id=$_POST["T1"];
if(!isset($_SESSION["role"]))
{
    header("Location:AuthError.php");
    die();
}
$role1=$_SESSION["role"];
$id1=$_SESSION["id"];
if($role1!="Admin")
{
    header("Location:AuthErrorAdmin.php");
    die();
}
if(GetRole($id)!='Student'){
    ?>
<h6>Invalid Student Id . </h6><a href="StUpdateForm1.php">Try Again</a>...
    <?php
}
else if($id==null || $id=="")
{
    ?>
        <form method="post" action="StudentUpdate.php">
            ID<input type="Text" name="T1" size="20"></input><br/>
            <input type="submit" value="Search"></input>
        </form>
    <?php
}
else
{
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
    $query="Select * from stdata where id=$id";
    $result=mysql_query($query);
    $n=mysql_num_rows($result);
    if($n>0)
    {
        $rw=  mysql_fetch_array($result);
        $a2=$rw["name"];
        $a3=$rw["branch"];
        $a4=$rw["YOAD"];
        $a5=$rw["status"];
        ?>
        <form method="post" action="StUpdate.php">
            Name<input type="text" size="20" name="T1" value='<?php echo "$a2"; ?>'></input><br/>
            Branch<input type="text" size="20" name="T2" value='<?php echo "$a3"; ?>'></input><br/>
            YOAD<input type="text" size="20" name="T3" value='<?php echo "$a4"; ?>'></input><br/>
            Status<input type="text" size="20" name="T4" value='<?php echo "$a5"; ?>'></input><br/>
            <input type="hidden" size="20" name="H1" value='<?php echo "$id"; ?>'></input><br/>
            <input type="submit" name="B1" value="Update"></input>
        </form>
        <?php
    }
    else
    {
        echo "<h1>Invalid ID</h1>";
        echo "<a href='StUpdateForm1.php'>Try Again</a>";
    }
}
?>