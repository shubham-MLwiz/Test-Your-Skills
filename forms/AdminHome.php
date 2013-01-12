<?php
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
    $query="select * from stdata where id='$id1'";
    $result=mysql_query($query,$cn);
    $n=mysql_num_rows($result);
    if($n>0)
    {
        $rw=mysql_fetch_array($result);
        $a1=$rw["name"];
        $a2=$rw["branch"];
        $a3=$rw["YOAD"];
        $a4=$rw["status"];
        $photo=$rw["photo"];
        if($photo=="nothing")
        {
            echo "<td>";
            echo "<form method=post enctype='multipart/form-data' action='UploadFile.php'>";
            echo "<input type=file name=F1 size=20><br/>";
            echo "<input type=submit value='Upload Photo' name=B1>";
            echo "</form>";
            echo "</td>";
        }
        else
        {
            echo "<img src='photos/$photo' width='100' height='100' /><br/><br/>";
        }
?>
        <a href='UpdateProfile.php'>Update Profile</a><br/><br/>
        <a href='StRegForm.php'>Register Student</a><br/><br/>
        <a href='FacultyRegForm.php'>Register Faculty</a><br/><br/>
        <a href='StUpdateForm1.php'>Update Student</a><br/><br/>
        <a href='RegisterQuestion.php'>Register Question</a><br/><br/>
        <a href='ShowData.php'>See Database</a><br/><br/>
        <a href='Delete.php'>Delete</a><br/><br/>
        <a href='DeleteQuestion.php'>Delete Question</a><br/><br/>
        <a href='Logout.php'>Logout</a><br/>
   <?php }?>