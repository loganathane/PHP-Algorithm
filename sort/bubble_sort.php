<?php
/**
 * Implementation of bubble sort algorithm in PHP. 
 */

class bsort
{
  
public static function bubble_sort(&$elements, $fn = 'comparison_function') {
  for ($i = 0; $i < sizeof($elements) - 1; $i++) {
    $flag = false;
    for ($j = sizeof($elements) - 1; $j >= ($i + 1); $j--) {
      if ( $fn($elements[$j], $elements[$j-1]) ) {
        // swap the element
        $tmp = $elements[$j - 1];
        $elements[$j - 1] = $elements[$j];
        $elements[$j] = $tmp;
        $flag = true;
      }
      if (!$flag) {
            break;
        }
    }
  }
}
}

function comparison_function(&$a, &$b) {
  return $a < $b;
}

// Example usage:
$a = array(3, 5, 9, 8, 5, 7, 2, 1, 13, -1, 3, 5, 9, 8, 5, 7, 2, 1, 13, -1);
echo '<pre>';
var_dump($a);
//place this before any script you want to calculate time
$time_start = microtime(true);
$b = new bsort;
$b->bubble_sort($a); // Sort the elements
var_dump($a);
// Display Script End time
$time_end = microtime(true);
//dividing with 60 will give the execution time in minutes other wise seconds
$execution_time = ($time_end - $time_start)/60;

//execution time of the script
echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';
