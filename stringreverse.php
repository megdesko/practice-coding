<?php
// Author: Marguerite Desko
// basically, a long, drawn out version of str_reverse
// function to reverse the string
// can be called with argument (string) on command line

function stringReverse ($string) {
	//find the length of the string
	$length = strlen($string);
	// use for loop to track position in string
	// by taking the negative value of the iterator
	// starting at 1 (last char in string is -1 position)
	for ($i = 1; $i <= $length; $i++) {
		$position = -($i);
		// add to the reverse string the single letter at the 
		//current position
		$revString .= substr($string, $position, 1);
	}
	//return reversed string
	return $revString;
}

//put a value in for the starting string, could be anything
if ($argv[1]) {
	$startingString = $argv[1];
}
else {
	$startingString = 'sesquipedalian';
}

// generate a reverse string using the string reverse fn
$endingString = stringReverse($startingString);

// print the result on screen
echo $startingString.' turns into '.$endingString."\n";

?>

