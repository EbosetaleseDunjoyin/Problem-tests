<?php 

function max_sum_less_than_k($a, $k) {
    $n = count($a);
    $max_sum = -1;
    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            $sum = $a[$i] + $a[$j];
            if ($sum < $k && $sum > $max_sum) {
                $max_sum = $sum;
            }
        }
    }
    return $max_sum;
}


$a = [10,20,30] ;
$k = 15;

echo max_sum_less_than_k($a, $k);







?>