<?php
// Author: Marguerite Desko
// Purpose: check if string has any repeating characters

function unique_chars($string) {
	// get the length of the string
	$length = strlen($string);
	$character_count = array();
	for ($i = 0; $i < $length; $i ++) {
		$char = substr($string, $i, 1);
		$character_count[$char] = $character_count[$char] + 1;
		if ($character_count[$char] > 1) {
			return FALSE;
		}
	}
	return TRUE;
}	

// do this using no other data structures
function unique_chars_noarray($string) {
	// get the length of the string
	$length = strlen($string);
	// iterate through the string
	for ($i = 0; $i < $length; $i++) {
		$char = substr($string, $i, 1);
		$remaining_string = substr($string, ($i+1));
		if (strpos($remaining_string, $char) !== FALSE) {
			return FALSE;
		}
	}
	return TRUE;
}


$result = unique_chars_noarray($argv[1]);
if ($result === TRUE) {
	echo 'The string '.$argv[1].' has only unique characters!';
}

else {
	echo 'fail!';
	echo 'The string '.$argv[1].' has non-unique characters!';
}


?>
