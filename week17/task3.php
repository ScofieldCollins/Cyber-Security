<?php

$array1 = array("China","Germany","France","Japan");

$num = count($array1);

for($i = 0;$i < $num;$i++){
    echo $array1[$i] . PHP_EOL;
}

foreach($array1 as $key=>$value){
    echo $key . " " . $value . PHP_EOL;
}

?>