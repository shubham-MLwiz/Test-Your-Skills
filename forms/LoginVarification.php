<?php
    require_once 'DataFunctions.php';
    $id1=$_POST["T1"];
    $pass1=$_POST["T2"];
    $role=CheckLogin($id1, $pass1);
    if($role!="nothing")
    {
            session_start();
            if(! isset($_SESSION["role"]))
            {
                $_SESSION["role"]=$role;
                $_SESSION["id"]="".$id1;
            }
            if($role=="Admin")
            {
                header("Location:AdminHome.php");
                die();
            }
            else if($role=="Faculty")
            {
                header("Location:FacultyHome.php");
                die();
            }
            else if($role=="Student")
            {
                header("Location:UserHome.php");
                die();
            }       
    }
    else
    {
        header("Location:LoginError.php");
    }
?>