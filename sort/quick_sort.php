<?php
// Quicksort is a divide and conquer algorithm: recursively split a large array in two sub-arrays, one with low elements and second with high elements.
// Algorithm:

// Pick an element, called pivot, from the list.
// Reorder hte list so the element with value less than pivot came before pivot, and elements higher came after the pivot.
// Recursively sort the sub-list of lower and higher elements.
// This algorithm is used as built-in in PHP and in MySQL and is most widely used.
// Performance:

// Worst case: O(n2)
// Average case: O(n logn)
// Best case: O(n logn)
/**Function for sorting an array with quick sort algorithm.
 * 
 * @param array $array
 * @return array
 */
/**
* 
*/
class qSort 
{
    

public static function quickSort(array $array) {
    if (count($array)<2) 
        return $array;
    $low=array();
    $high=array();
    $length=count($array);
    $pivot=$array[0];
    for ($i=1;$i<$length;$i++) {
        if ($array[$i]<$pivot) {
            $low[]=$array[$i];
        } else {
            $high[]=$array[$i];
        }
    }
    return array_merge(self::quickSort($low),array($pivot),
                    self::quickSort($high));
}
}


// Example usage:
$a = array(3, 5, 9, 8, 5, 7, 2, 1, 13, -1, 8, 3232, 757, 3804, 31, 999, 442, 8234, 534, 21, 387, 3, 5, 9, 8, 5, 7, 2, 1, 13, -1, 8, 3232, 757, 3804, 31, 999, 442, 8234, 534, 21, 387, 3, 5, 9, 8, 5, 7, 2, 1, 13, -1, 8, 3232, 757, 3804, 31, 999, 442, 8234, 534, 21, 387, 3, 5, 9, 8, 5, 7, 2, 1, 13, -1, 8, 3232, 757, 3804, 31, 999, 442, 8234, 534, 21, 387);
echo '<pre>';
var_dump($a);
$g = new qSort;
// $g->quickSort($a); // Sort the elements
//place this before any script you want to calculate time
$time_start = microtime(true);
var_dump($g->quickSort($a));
// Display Script End time
$time_end = microtime(true);
//dividing with 60 will give the execution time in minutes other wise seconds
$execution_time = ($time_end - $time_start)/60;

//execution time of the script
echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';

