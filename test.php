<?php

// $numArray = array(1,2,3,4,5);
// //creating the list
// // list($a, $b, $c, $d) = $numArray;

// // echo"a = ".($a);
// // echo"b = ".($b);
// // echo"c = ".($c);
// // echo"d = ".($d);

// // array_push($numArray,6,7);
// // list($a, $b, $c, $d, $e, $f) = $numArray;
// // echo"d = ".($e);

// print($numArray[0]);

// //The reset() function moves the internal pointer to the first element of the array
// reset($numArray);
// print($numArray[3]);

//Clear List Items
$array1 = array(1,2,3,4,5);

// for($i=0; $i<=count($array1); $i++){
//     $val = '';
//     $array1[$i] = $val;
   
// }
unset($array1);
print_r("Array is: ".$array1[2]);
