<?php
$arr = [12, 4, 8, 7, 4, [54, 7, 8, [5, 1, 4, 3]]];

function recursive_print($arr)
{
    foreach ($arr as $prom) {
        if (gettype($prom) == "array") {
            foreach ($prom as $prom1) {
                var_dump($prom1);
            }
        } else {
            var_dump($prom);
        }
    }
}

recursive_print($arr);
