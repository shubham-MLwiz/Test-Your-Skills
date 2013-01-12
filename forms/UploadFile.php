<?php
session_start();
require_once 'DataFunctions.php';
//echo "".$_FILES['F1']['name'];
if(!isset($_SESSION["role"]))
{
    header("Location:AuthError.php");
    die();
}
$role=$_SESSION["role"];
$id1=$_SESSION["id"];
if(count($_FILES))
{
    if(!$_FILES["F1"]["size"])
    {
        echo "Error : No file uploaded</br></br>";
        if($role=='Student') 
        echo "<a href='UserHome.php'>Home</a>";
        else if($role=='Faculty')
        echo "<a href='FacultyHome.php'>Home</a>";
        else if($role=='Admin')
        echo "<a href='AdminHome.php'>Home</a>";
        else
        {header("Location:AuthError.php");die();}
    }
    else
    {
        $target=dirname(__FILE__)."\\photos\\".basename($_FILES["F1"]["name"]);
        //Fetch file from temporary space the send to target //location
        if(!move_uploaded_file($_FILES["F1"]["tmp_name"], $target))
        {
            echo "Error during upload";
            die();
        }
        else
        {
            $id=$_SESSION["id"];
            $location="".basename($_FILES["F1"]["name"]);
            $query="update stdata set photo='$location' where id='$id'";
            //echo "$query<br>"; die();
            mysql_query($query);
            if($role=='Student') 
            {header("Location:UserHome.php");die();}
            else if($role=='Faculty')
            {header("Location:FacultyHome.php");die();}
            else if($role=='Admin')
            {header("Location:AdminHome.php");die();}
            else
            {header("Location:AuthError.php");die();}
        }
    }
}
else
{
    echo "No file uploaded <br>";
}
?>