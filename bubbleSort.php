<?php
// Author: Marguerite Desko
// This will do a bubble sort of an array filled 
// with random numbers
// can call with desired # of array elements and 
// low digit for variability/ calculating the max value
// of the random numbers
// defaults to 7000, 3

//$debug = TRUE; set to true if debugging this

// require class that makes arrays
require_once("makeNumericArray.php");

// this function will do a slow "bubble sort" of an array
function bubbleSort ($array) {
	$arrayCount = count($array);
	$swapped = TRUE; // set value to true so while initializes
	
	// until nothing else in the row needs to be swapped, keep
	// attempting to sort values
	
	while ($swapped) {
		// this particular row is not yet swapped
		$swapped = FALSE;
		// set up iterator for counting backwards from sorted section
		// that results at end of array
		$j++;
		// go through the array, element by element
		
		for ($i = 0; $i < $arrayCount - $j; $i ++) {
			// switch the positions of the elements if a lower value
			// is after a higher value
			if ($array[$i] > $array[$i + 1]) {
				$holdValue = $array[$i];
				$array[$i] = $array[$i + 1];
				$array[$i + 1] = $holdValue;
				$swapped = TRUE;
			}
		}
	}
// return the sorted array from the function	
return ($array);
}

// if command line values, set them
if ($argv[1]) {
	$arrayElements = $argv[1];
}
// otherwise, they are hard coded
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
$sortedArray = bubbleSort($myArray);
// print it for fun.  Success!
print_r($sortedArray);

?>
