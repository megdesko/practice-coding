<?php
// Author: Marguerite Desko
// Purpose: function that compresses a string with repeated characters to
// character/number (e.g. aabbbccc becomes a2b3c3).  
i//Caveat: if the new string
// is same length or longer than the original, return the original string

function compress_string($string) {
	$length = strlen($string);
	// examine each character in the string
	for ($i = 0; $i <= $length; $i++) {
		$current_character = substr($string, $i, 1);
		// if the character we're looking at is the same as the one before it,
		// increment the counter for this character
		if ($current_character == $previous_character) {
			$char_count ++;
		}
		else if ($current_character != $previous_character) {
			$retstr .= $previous_character.$char_count;
			// set the previous character to the current character
			$previous_character = $current_character;
			// reset the character count to 1 for the new letter
			$char_count = 1;
		}
	}
	// if the "compressed" version isn't shorter than the original, return the
	// original (part of the problem)
	if (strlen($retstr) < $length) {
		return $retstr;
	}
	// otherwise, return the compressed string
	else {
		return $string;
	}
}

$result = compress_string($argv[1]);
echo $result;


?>
