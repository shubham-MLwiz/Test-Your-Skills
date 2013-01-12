<?php
    require_once "DataFunctions.php";
    session_start();
    if(!isset($_SESSION["role"]))
    {
        header("Location:AuthError.php");
        die();
    }
    $role=$_SESSION["role"];
    $id1=$_SESSION["id"];
    $qid=$_POST["qid"];
    //echo "qid='$qid' ";die();
    $a2=$_POST["T2"];
    $a3=$_POST["T3"];
    $a4=$_POST["T4"];
    $a5=$_POST["T5"];
    $a6=$_POST["T6"];
    $a7=$_POST["T7"];
    $a8=$_POST["T8"];
    $query="update qbank set subject='$a2',question='$a3',op1='$a4',op2='$a5',op3='$a6',op4='$a7',ans=$a8 where qid='$qid' ";
    echo "query=$query";die();
    $result=  mysql_query($query);
    $n=mysql_num_rows($result);
    if($n>0)
    {
        echo "<h3>Question Updated...</h3>";
    }
    else
    {
        echo "<h4>Server Error...</h4>";
        echo "Unable to Update data</br></br>";
    }
    if($role=='Student')
    {
        echo "<a href='UserHome.php'>Home</a>";
    }
    else if($role=='Faculty')
    {
        echo "<a href='FacultyHome.php'>Home</a>";
    }
    else
    {
        echo "<a href='AdminHome.php'>Home</a>";
    }
?>
