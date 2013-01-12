<?php
session_start();
require_once 'DataFunctions.php';
if(!isset($_SESSION["role"]))
{
    header("Location:AuthError.php");
    die();
}
$role=$_SESSION["role"];
$id1=$_SESSION["id"];
if($role!="Student")
{
    header("Location:AuthErrorStudent.php");
    die();
}
$PType=$_POST["PT"];
$query="select * from qbank where subject='$PType'";
$result=mysql_query($query);
$n=  mysql_num_rows($result);
$correct=0;
$incorrect=0;
$skip=0;
$size=$_POST["size"];
//echo "size = $size";die();
$qid=array($size);
if($n>0)
{
    $i=1;
    while($i<=$size){
        $qid[$i]=$_POST["qid$i"];
        $ans=$_POST["R$i"];
        $key=GrabKey($qid[$i]);
        if($ans==null || $ans=="") $skip++;
        else if($ans==5) $skip++;
        else if($key==$ans) $correct++;
        else $incorrect++;
        $i++;
    }
}
$i--;
$marks=$correct*4;
$total=$size*4;
if(($marks/$total)>=0.85) $comment='Excellent';
else if(($marks/$total)>=0.75) $comment='Very Good';
else if(($marks/$total)>=0.65) $comment='Good';
else if(($marks/$total)>=0.55) $comment='Average';
else if(($marks/$total)>=0.45) $comment='Fair';
else $comment='Poor';
$query="insert into exam_data(id,correct,incorrect,skip,marks,comment) values('$id1',$correct,$incorrect,$skip,$marks,'$comment')";
$result=  mysql_query($query);
?>
<table border="15" bordercolordark="red" bordercolorlight="blue">
    <tr>
        <th>Total Questions</th>
        <td><?php echo"$i"; ?></td>
    </tr>
    <tr>
        <th>Correct</th>
        <td><?php echo"$correct"; ?></td>
    </tr>
    <tr>
        <th>Incorrect</th>
        <td><?php echo"$incorrect"; ?></td>
    </tr>
    <tr>
        <th>Skip</th>
        <td><?php echo"$skip"; ?></td>
    </tr>
    <tr>
        <th>Marks</th>
        <td><?php echo"$marks"; ?></td>
    </tr>
</table>
<br/>
<h2><a href="UserHome.php">Home</a></h2>