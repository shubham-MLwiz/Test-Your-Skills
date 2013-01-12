<?php
session_start();
$role=$_SESSION["role"];
$id1=$_SESSION["id"];
if(!isset($_SESSION["role"]) && $role!="Admin" && $role!='Student' && $role!='Faculty')
{
    header("Location:AuthError.php");
    die();
}
else{
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <form action="RegisterQuestion1.php" method="POST">
            Tag&nbsp  <select name="T2">
                <option>C</option>
                <option>C++</option>
                <option>Java</option>
                <option>SQL</option>
                <option>Python</option>
            </select><br/>
            Question<textarea name="T3" rows="5" cols="20"></textarea><br/><br/>
            OP1 <input type="text" name="T4" value="" size="30" /><br/><br/>
            OP2 <input type="text" name="T5" value="" size="30" /><br/><br/>
            OP3 <input type="text" name="T6" value="" size="30" /><br/><br/>
            OP4 <input type="text" name="T7" value="" size="30" /><br/><br/>
            Ans&nbsp:&nbsp<input type="text" name="T8" value="" size="30" /><br/><br/>
            
            <input type="submit" name="B1" value="Register" />
        </form>
    </body>
</html>
<?php } ?>