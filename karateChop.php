<?php
// author: Marguerite Desko
// This program will generate an array of numbers,
// sort that array, and then search for a particular value in 
// that array
//$debug = TRUE;  //set to true for debugging

//require class that makes the array 
require_once("makeNumericArray.php");

// function to cut array in half, keeping the part 
// the target value
// expects sorted target value, sorted array as input
function chopArray($Target, $array) {
	$arrayCount = count($array);
	// if there is no array, you can't find anything in it
	if ($arrayCount == 0) {
		$ret = -1;
		return ($ret);
	}
	//figure out the key of the middle element
	$middle = ceil($arrayCount/2);
	// if the target is the value of the middle element, return
	if ($Target == $array[$middle]) {
		$ret = $middle;
		return ($middle);
	}
	//if the target is greater than the value of the middle
	//get rid of the first half of the array and return the 
	// part with the target value in it
	else if ($Target >= $array[$middle]) {
		$newArray = array_slice($array, ($middle + 1));
		return ($newArray);
	}
	// if it's less than the middle value, return the first half
	//of the array to search in
	else {
		$newArray = array_slice($array, 0, ($middle - 1));
		return ($newArray);

	}
	
	
}
//enter desired number of elements, via command line, or 
// default to 10K elements
if ($argv[1]) {
	$desiredArrayCount = $argv[1];
}
else {
	$desiredArrayCount = 10000;
}

// search target is a random number
$Target = rand(1,1000);

//make new class to create the array
$p = new makeNumericArray($desiredArrayCount, 5);
//generate an array the fast way
$p->makeArray();
// set the local array to search to the one created
// by the array-making object
$myArray = 	$p->getfinalArray();

//sort the array in ascending order
sort($myArray);
if ($debug) var_dump($myArray); //check the values in array

//At the beginning, we don't have a result yet
$gotResult = FALSE;
while ($gotResult ===FALSE) {
	$myResult = null;
	$myResult = chopArray($Target, $myArray);
	if (is_array($myResult)) {
		$myArray = $myResult;
		continue;
	}
	// if there is a result, then it's been found
	if (is_numeric($myResult)) {
		$gotResult = TRUE;
	}
}

//State whether the search was successful
// returns -1 if not found, the key where the value was found if it was
echo 'The Target is '.$Target.' and The result is '.$myResult."\n";
if ($myResult == -1) {
	echo 'The Target was not found.'."\n";
}
else {
	echo 'The target was found.  Hooray!';
}
?>
