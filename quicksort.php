<?php
// Author: Marguerite Desko
// This will do a quick sort of an array filled 
// with random numbers
// can call with desired # of array elements and 
// low digit for variability/ calculating the max value
// of the random numbers
// defaults to 7000, 3

//$debug = TRUE; set to true if debugging this

// require class that makes arrays
require_once("makeNumericArray.php");

// this function will do a quick sort of an array
function quicksort ($array) {
	// set up large, small, and pivots arrays for use later
	$small = array();
	$large = array();
	$pivotArr = array();
	
	// count the elements in the array
	$arrayCount = count($array);
	
	// if there is only one element in the array, it is sorted
	// so return the already sorted array
	if ($arrayCount <= 1) {
		return ($array);
	}
	else {
		// find the middle element and set it to the pivot value
		$middle = ceil($arrayCount / 2);
		$pivot = $array[$middle];
		// go through the array; sort into small and large arrays
		//depending on relationship to the pivot
		for ($i = 0; $i < $arrayCount; $i++) {
			if ($array[$i] < $pivot) {
				$small[] = $array[$i];
			}
			else if ($array[$i] > $pivot) {
				$large[] = $array[$i];
			}	
			else if ($array[$i] == $pivot) {
				$pivotArr[] = $array[$i];
			}	
		}		
	}
	
// returns the sorted array; calls quicksort recursively on the small and
// large arrays until there's only one element in each of the progressively 
// shorter arrays
return array_merge(quicksort($small),  $pivotArr, quicksort($large));
}

// if command line values, set them for use in this program
// otherwise, use the default values
if ($argv[1]) {
	$arrayElements = $argv[1];
}
else {
	$arrayElements = 7000;
}
if ($argv[2]) {
	$variability = $argv[2];
}
else {
	$variability = 3;
}	

// initialize arrays
$myArray = array();
$sortedArray = array();

// instantiate object and make an array
$p = new makeNumericArray($arrayElements, $variability);
$p->makeArray();
// set local array to the one set by the array making object method
$myArray = $p->getfinalArray();

if ($debug) print_r($myArray); // if debugging, check array values
// sort the array
$sortedArray = quicksort($myArray);
// print it for fun.  Success!
print_r($sortedArray);

?>
