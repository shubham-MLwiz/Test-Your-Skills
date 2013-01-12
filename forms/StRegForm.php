<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <form action="StReg.php" method="POST">
            Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="T1" value="" size="30" /><br/><br/>
            Branch&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="T2" value="" size="30" /><br/><br/>
            Admission Year&nbsp&nbsp<select name="T3">
            <?php
            for($i=1990;$i<2012;$i++){
            echo "<option>$i</option>";
            }
            ?>
            </select><br/><br/>
            Status&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="T4" value="" size="30" /><br/><br/>
            Password&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="password" name="T5" value="" size="30" /><br/><br/>
            Confirm&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="password" name="T6" value="" size="30" /><br/><br/>
            
            <input type="submit" name="B1" value="Register" />
        </form>
    </body>
</html>
