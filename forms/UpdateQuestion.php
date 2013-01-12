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
    $qid=$_GET["qid"];     //to get the data from query string
    $n=0;
    $query="select * from qbank where qid=$qid";
    $result=mysql_query($query,$cn);
    $n=  mysql_num_rows($result);
    if($n>0)
    {
        $rw=mysql_fetch_array($result);
        $a1=$rw["subject"];
        $a2=$rw["question"];
        $a3=$rw["op1"];
        $a4=$rw["op2"];
        $a5=$rw["op3"];
        $a6=$rw["op4"];
        $a7=$rw["ans"];
        ?>
        <form action="UpdateQuestion1.php" method="POST">
            <input type="hidden" name='qid' value='<?php echo "$qid"; ?>' ></input>
            Tag&nbsp  <select name="T2" value='<?php echo "$a1"; ?>' >
                <?php 
                if($a1=='C'){echo "<option selected='selected'>C</option>";
                ?>
                <option>C++</option>
                <option>Java</option>
                <option>SQL</option>
                <option>Python</option>
            <?php }
                else if($a1=='C++'){echo "<option selected='selected'>C++</option>";
                ?>
                <option>C</option>
                <option>Java</option>
                <option>SQL</option>
                <option>Python</option>
            </select><br/>
                <?php }
                else if($a1=='Java'){echo "<option selected='selected'>Java</option>";
                ?>
                <option>C</option>
                <option>C++</option>
                <option>SQL</option>
                <option>Python</option>
            </select><br/>
                <?php }
                else if($a1=='SQL'){echo "<option selected='selected'>SQL</option>";
                ?>
                <option>C</option>
                <option>Java</option>
                <option>C++</option>
                <option>Python</option>
            </select><br/>
                <?php }
                else if($a1=='Python'){echo "<option selected='selected'>Python</option>";
                ?>
                <option>C</option>
                <option>Java</option>
                <option>SQL</option>
                <option>C++</option>
            </select><br/>
                <?php } ?></br>
            Question : </br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;
            <textarea name="T3" rows="5" cols="20" value='<?php echo "$a2"; ?>' ><?php echo "$a2";?></textarea><br/><br/>
            OP1 <input type="text" name="T4" size="30" value='<?php echo "$a3"; ?>'  /><br/><br/>
            OP2 <input type="text" name="T5" size="30"  value='<?php echo "$a4"; ?>' /><br/><br/>
            OP3 <input type="text" name="T6" size="30"  value='<?php echo "$a5"; ?>' /><br/><br/>
            OP4 <input type="text" name="T7" size="30" value='<?php echo "$a6"; ?>'  /><br/><br/>
            Ans&nbsp:&nbsp<input type="text" name="T8" size="30" value='<?php echo "$a7"; ?>'  /><br/><br/>
            
            <input type="submit" name="B1" value="Submit" /><br/><br/>
        </form>
        <?php
    }
    else
    {
        echo "<h4>Server Error...</h4>";
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
