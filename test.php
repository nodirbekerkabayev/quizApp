<?php


function test($arr1,$arr2):void {
    $array=[];
    foreach ($arr1 as $k=>$v) {
        if (!isset($arr2[$k])) {
            $array[$k]='tushib qoldi';
        }
    }
    print_r($array);
}

$arr=['asadbek'=>2,'bobur'=>3,'c'=>4,'d'=>5,'e'=>6];
$arr2=['a'=>2,'4'=>3,'c'=>4,'d'=>5,'5'=>7];
test($arr,$arr2);