<?php

$arr = [1000, 500, 200, 100, 50, 20, 10, 5, 2, 1];
$outputArr = array();

function change($input, $arr)
{
    $outputArr = array();
    echo "zadana castka: ".$input."Kč<br>";
    for ($i = 0; $i < count($arr); $i++) {
        if ($input % $arr[$i] == $input - $arr[$i] || floor($input / $arr[$i]) == $arr[$i] || $input == 2) {
            $input === 2 ? array_push($outputArr, $arr[count($arr)-2]) : array_push($outputArr, $arr[$i]);            
            $input -= $arr[$i];
        }
    }
    return implode(" ", $outputArr);
}

echo change(1254, $arr);
