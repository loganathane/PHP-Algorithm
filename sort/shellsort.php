<?php
 
$arr = array();
for ($i = 0; $i < 100; ++$i) {
    $arr[] = $i;
}
shuffle($arr);
$sortedArr = shellSort($arr);
var_dump($sortedArr);
 
function shellSort(array $arr) {
    $gap = floor(count($arr)/2);
    while ($gap > 0) {
        for ($i = 0; $i < count($arr)-$gap; ++$i) {
            $arrWithGapsKeys = array();
            $arrWithGaps = array();
            $loop = true;
            $j = $i;
            while ($loop) {
                if (isset($arr[$j])) {
                    $arrWithGapsKeys[] = (int)$j;
                    $arrWithGaps[] = $arr[$j];
                    $j += $gap;
                } else {
                    $loop = false;
                }
            }
            $arrWithGapsOrdered = insertionSort($arrWithGaps);
            foreach ($arrWithGapsKeys as $key) {
                $arr[$key] = current($arrWithGapsOrdered);
                next($arrWithGapsOrdered);
            }
        }
        $gap = floor($gap/2);
    }
    return $arr;
}
 
function insertionSort(array $table) {
    $leftHand = array();
    foreach ($table as $card) {
        if (0 === count($leftHand)) {
            $leftHand[] = $card;
        } else {
            $insertedCard = false;
            $reindexedLeftHand = array();
            for ($i = count($leftHand)-1; $i >= 0; --$i) {
                if ($card >= $leftHand[$i]) {
                    for ($j = 0; $j <= $i; ++$j) {
                        $reindexedLeftHand[$j] = $leftHand[$j];
                    }
                    $reindexedLeftHand[] = $card;
                    for ($j = $i+1; $j < count($leftHand); ++$j) {
                        $reindexedLeftHand[$j+1] = $leftHand[$j];
                    }
                    $insertedCard = true;
                    break;
                }
            }
            if (false === $insertedCard) {
                $reindexedLeftHand[] = $card;
                foreach ($leftHand as $cardInLeftHand) {
                    $reindexedLeftHand[] = $cardInLeftHand;
                }
            }
            $leftHand = $reindexedLeftHand;
        }
    }
    return $leftHand;
}