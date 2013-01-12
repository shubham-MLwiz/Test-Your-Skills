<?php
$i=1;
$arr=array(20);
while($i<=20){
    $n=  rand(1, 30);
    $flag=0;
    for($j=0;$j<=$i;$j++){
        if($arr[$j]==$n) $flag=1;
    }
    if($flag!=1){
        $arr[$i]=$n;
        echo "n$i= $n";
        echo "<br/>";
        $i++;
    }
}
?>