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
?>
<form method="post" action="CheckPaper.php">
<?php
$PType=$_POST["P1"];
?>
    <input type='hidden' name='PT' value='<?php echo "$PType"; ?>' ></input>
<?php
$query="Select qid from qbank where subject='$PType' and id!='$id1' and qid NOT IN (Select qid from qvisited where id='$id1') ";
$result=mysql_query($query);
$n=  mysql_num_rows($result);
//echo "n=$n";die();
if($n>0)
{
    $sz=5;     //no of questions in paper
    $arrr=array($sz);
    ?>
    <input type='hidden' name="size" value="<?php echo "$sz"; ?>" ></input>
    <?php
    $arrr=num_rand($n, $sz);
    //echo "$arrr[0] </br>";echo "$arrr[1] </br>";echo "$arrr[2] </br>";echo "$arrr[3] </br>";echo "$arrr[4]";die();
    $i=1;
    while($i<=$sz)
    {
        global $cn;
        //echo "i = $i</br>";
        $query2="select * from qbank where qid=$arrr[$i]";
        //echo "query = $query2</br>";
        $result2=mysql_query($query2);
        $rw=  mysql_fetch_array($result2);
        $a1=$rw["question"];
        $a2=$rw["op1"];
        $a3=$rw["op2"];
        $a4=$rw["op3"];
        $a5=$rw["op4"];
        $a6=$rw["id"];
        $a7=$rw["qid"];
        $name=FindName($a6);
        ?>
    <input type='hidden' name='qid<?php echo "$i"; ?>' value="<?php echo "".$a7; ?> " >
            Q&nbsp<?php echo "$i"; ?>. <?php echo "$a1"; ?> ...Added By <?php echo "$name"; ?><br/>
            <input type="radio" name='R<?php echo "$i"; ?>' value="1"><?php echo "$a2"; ?></input><br/>
            <input type="radio" name='R<?php echo "$i"; ?>' value="2"><?php echo "$a3"; ?></input><br/>
            <input type="radio" name='R<?php echo "$i"; ?>' value="3"><?php echo "$a4"; ?></input><br/>
            <input type="radio" name='R<?php echo "$i"; ?>' value="4"><?php echo "$a5"; ?></input><br/>
            <input type="radio" name='R<?php echo "$i"; ?>' value="5">skip</input><br/><br/>
        <?php
        $i++;
        global $cn;
        $query3="insert into qvisited values('$id1',$a7,NULL,NULL)";
        $result3=mysql_query($query3);
    }
    echo "<input type=submit value=Done>";
}
else
{
    echo "Server Error!!!";
    echo "<h3><a href ='UserHome.php'>Home</a></h3>";
}
function FindName($id)
{
    $name="";
    global $cn;
    $query="Select * from stdata where id=$id";
    $result=mysql_query($query,$cn);
    $n=  mysql_num_rows($result);
    if($n>0)
    {
        $rw=mysql_fetch_array($result);
        $name=$rw["name"];
    }
    return $name;
}
?>
</form>