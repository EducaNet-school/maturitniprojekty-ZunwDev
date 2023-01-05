<?php

function select_sort($arr)
{
    for ($i = 0; $i < sizeof($arr); $i++) {
        $minIndex = $i;
        for ($j = $i+1; $j < sizeof($arr); $j++) {
            if ($arr[$j] < $arr[$minIndex]) {$minIndex = $j;}
        }
        $temp = $arr[$minIndex];
        $arr[$minIndex] = $arr[$i];
        $arr[$i] = $temp;
    }
    return implode(", ", $arr);
}

function genRandArr($min = 1, $max = 1000000, $l = 100)
{
    $arr= []; for ($i = 0; $i < $l; $i++) array_push($arr, rand($min, $max)); return $arr;
}

echo select_sort(genRandArr());