<?php
// Palindrome checker
// Author: Marguerite Desko
// Checks a string to see whether it's a palindrome or not
// assumes that string is to be checked as is; could add str_to_lower or
// str_to_upper to make all characters the same case if needed

function is_palindrome_1($string) {
	// figure out how long half the string is, as we only need to look at half
	// the string to know if it matches the other half
	$halfLength = floor(strlen($string)/2);
	$length = strlen($string);
	// iterate from beginning and end of string comparing characters as you go
	for ($i = 0; $i <= $halfLength; $i ++) {
		if($debug) {
			echo 'Comparing: '.substr($string, $i, 1).' and '. substr($string,
				($length-1-$i), 1);
		}
		if (substr($string, $i, 1) != substr($string, ($length-1-$i), 1)) {
			// return false if fails test
			return FALSE;
		}
	}
	// otherwise, return true
	return TRUE;
	
}
 
// function to reverse a string
function reverse_it($string) {
	// find the length of the string
	$length = strlen($string);
	// iterate through the characters in the string in reverse order, adding
	// them to the string as we go.
	for ($i = 0; $i <= $length; $i ++) {
		$newString .= substr($string, ($length-$i), 1);
	}
	return $newString;
}

// function to check if a string is a palindrome
function is_palindrome_2($string) {
	// reverse the string
	$revString = reverse_it($string);
	// then check to see if the reversed string is the same.  If it is, it's a
	//  palindrome
	if ($string == $revString) {
		return TRUE;
	}
	// otherwise, return false
	return FALSE;
}

// Testing area
if ($argv[1]) {
	$string = $argv[1]; 
	$myTest = is_palindrome_2($string);
	if ($myTest == TRUE) 
		echo 'Result: TRUE'."\n";
	else
		echo 'Result: FALSE'."\n";
}

?>
