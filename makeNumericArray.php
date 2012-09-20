<?php
// Author: Marguerite Desko
//this class makes arrays with numeric values

class makeNumericArray {
// declare class variables
var $elementsDesired; // desired count of final array
var $finalArray = array(); // the array that will be created
var $maxValue; // highest possible value
var $debug = FALSE; //if true, then prints debug messages

// incoming parameters are # of elements desired
// and # to multiply that by to get the maximum possible value
function __construct($elementsDesired, $variability) {
	if ($this->debug) echo 'Entering '.__METHOD__."\n";
	$this->elementsDesired = $elementsDesired;
	$this->maxValue = $this->elementsDesired * $variability;
}

// function to make array with unique values
// Kind of slow... works most of the time.
// TODO: Make sure works all the time, have seen some errors
public function makeUniqueValueArray() {
	//echo 'Entering '.__METHOD__."\n";
	while (count($this->finalArray) < $this->elementsDesired) {
		$this->addToArray();
	}

}

// adds the unique random number to the array
private function addToArray($highestNumber) {
	if ($this->debug) echo 'Entering '.__METHOD__."\n";

	$candidate = rand(1, $this->maxValue);
	if (in_array($candidate, $this->finalArray)!==FALSE) {
		return;
	}	
	else if (in_array($candidate, $this->finalArray)===FALSE) {
		$this->finalArray[] = $candidate;
	}
}	

//function to allow retrieval of final set array
public function getfinalArray() {
	if ($this->debug) echo 'Entering '.__METHOD__."\n";
	return ($this->finalArray);
}

//fast method to make the array of random numbers
// use when values don't need to be unique
// or when time is of the essence
public function makeArray() {
	if ($this->debug) echo 'Entering '.__METHOD__."\n";		
	// if the elements in the array are less than the amount wanted
	// keep adding random values to the array
	while (count($this->finalArray) < $this->elementsDesired) {
		$this->finalArray[] = rand(1, $this->maxValue);
	}

}
}
?>
