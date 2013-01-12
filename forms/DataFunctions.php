<?php
    $cn= mysql_connect("localhost","root","kota");
    if(!$cn)
    {
        echo "Unable to connect";
        die();
    }
    $db=  mysql_select_db("online_exam",$cn);
    if(!$db)
    {
        echo "Unable to open the database for work";
        die();
    }
    function FetchData($query) //Select data from table
    {
        global $cn;
        $rs=mysql_query($query,$cn);
        return $rs;
    }
    function CreateLogin($id, $password, $role)
    {
        global $cn;
        $sql="insert into logininfo values($id,$password,$role)";
        mysql_query($sql);
    }
    function CheckLogin($username, $password)
    {
        $role="nothing";
        $query="select * from logininfo where id=$username and pwd='$password'";
        //echo "query=$query";die();
        $result=FetchData($query);
        //echo "$result";die();
        $n=mysql_num_rows($result);
        //echo "n=$n";die();
        if($n>0)
        {
            $rw=mysql_fetch_array($result);
            $role=$rw["role"];
        }
        return $role;
    }
    function GenerateKey($tablename, $start)
    {
        $key=$start;
        $query="select * from $tablename";
        $result=FetchData($query);
        $n=mysql_num_rows($result);
        $key=$key+$n;
        return $key;
    }    
    function GetRole($id){
        $role="nothing";
        $query="select role from logininfo where id='$id' ";
        $result=FetchData($query);
        $n=mysql_num_rows($result);
        if($n>0)
        {
            $rw=mysql_fetch_array($result);
            $role=$rw["role"];
        }
        return $role;
    }
    function GrabKey($qid){
        $key="nothing";
        $query="select * from qbank where qid=$qid ";
        //echo "$query";die();
        $result=FetchData($query);
        $n=mysql_num_rows($result);
        if($n>0)
        {
            $rw=mysql_fetch_array($result);
            $key=$rw["key"];
        }
        return $key;
    }
    function num_rand($n,$sz){
        $i=1;
        $arr=array($sz);
        while($i<=$sz){
            $k=  rand(1, $n);
            $flag=0;
            for($j=0;$j<=$i;$j++){
                if($arr[$j]==$k) {$flag=1;break;}
            }
            if($flag!=1){
                $arr[$i]=$k;
                $i++;
            }
        }
        return $arr;
    }
?>