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
    $query="select * from qbank where id=$id1";
    $result=mysql_query($query,$cn);
    $n=mysql_num_rows($result);
    if($n>0)
    {
        $i=1;
        while($rw=mysql_fetch_array($result)){
            $a1=$rw["qid"];
            $a2=$rw["id"];
            $a3=$rw["subject"];
            $a4=$rw["question"];
            $a5=$rw["op1"];
            $a6=$rw["op2"];
            $a7=$rw["op3"];
            $a8=$rw["op4"];
            $a9=$rw["ans"];
            echo "Tag&nbsp:&nbsp$a3</br>";
            echo "Q$i&nbsp:&nbsp$a4</br>";
            echo "1.&nbsp$a5</br>";
            echo "2.&nbsp$a6</br>";
            echo "3.&nbsp$a7</br>";
            echo "4.&nbsp$a8</br>";
            echo "ans&nbsp:&nbsp$a9</br></br>";
            echo "<a href='UpdateQuestion.php?qid=$a1'>Update</a> &nbsp&nbsp";     //query string
            echo "<a href='DeleteQuestion.php?qid=$a1'>Delete</a></br></br>";     //query string
            $i++;
        }
    }
    else
    {
        echo "<h4>Server Error...</h4></br>";
        echo "Unable to fetch data</br></br>";
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
