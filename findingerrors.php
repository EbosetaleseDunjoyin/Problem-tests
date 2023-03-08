<?php
function find_error_nums($nums) {
    sort($nums);
    $n = count($nums);
    $array = [];
    $newArr = array_count_values($nums);
    foreach ($newArr as $key => $value ){
        if($value > 1){
            array_push($array,$key);

        }
    }
    for($i = 1; $i <= $n; $i++){
        if(!in_array($i,$nums)){
            array_push($array,$i);
        }
    }

    return $array;


}

$nums = [1,2,3,4,3];

var_dump(find_error_nums($nums));

