<?php

$list = array();

for($i = 0;$i <100;$i++){
    $list[$i] = rand(0,100);
    while($list[$i] % 2 == 0){
        echo $list[$i]." is a even number".PHP_EOL;
        while($list[$i] % 3 == 0){
            echo "-@-@-".PHP_EOL;
            break 3;
        }
        continue 2;
        echo "never echo".PHP_EOL;
    }
    echo $list[$i].PHP_EOL;
}

echo "loop is end".PHP_EOL;

?>