<?php

function bub_sort($arr)
{
    for ($i = 0; $i < count($arr); $i++) {
        for ($j = 0; $j < count($arr) - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
    return implode(", ", $arr);
}

function genRandArr($min = 1, $max = 1000000, $l = 100)
{
    $arr= []; for ($i = 0; $i < $l; $i++) array_push($arr, rand($min, $max)); return $arr;
}

echo bub_sort(genRandArr());
