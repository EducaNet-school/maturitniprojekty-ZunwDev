<?php

$zvirata = ["klokan", "opice", "slon", "kočka"];

function vypis($zvirata, $retezec)
{
    return array_filter($zvirata, function ($el) use ($retezec) {
        return strpos($el, $retezec);
    });
}

print_r(vypis($zvirata, "o"));
