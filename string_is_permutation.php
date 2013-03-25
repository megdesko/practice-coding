<?php
// Author: Marguerite Desko
// Write a function that tells you if one string is a permutation of another

function is_permutation($string1, $string2) {
	// if the strings are the same, they aren't permuted. return false
	if ($string1 === $string2) {
		return FALSE;
	}
	// if the strings have different length, cannot be permutations, return
	// false
	if (strlen($string1) !== strlen($string2)) {
		return FALSE;
	}
	// look at both strings and make arrays that contain their character counts
	// for each character in the string
	$resultArray1 = make_character_array($string1);
	$resultArray2 = make_character_array($string2);
	
	var_dump($resultArray1);
	var_dump($resultArray2);
	foreach ($resultArray1 as $key => $value) {
		if ($value !== $resultArray2[$key]) {
			return FALSE;
		}
	}
	return TRUE;	
}
function is_permutation_alt($string1, $string2) {
	// if the strings are the same, they aren't permuted. return false
	if ($string1 === $string2) {
		return FALSE;
	}
	// if the strings have different length, cannot be permutations, return
	// false
	if (strlen($string1) !== strlen($string2)) {
		return FALSE;
	}
	// look at both strings and make arrays that contain their character counts
	// for each character in the string
	$resultArray1 = make_character_array($string1);
	$resultArray2 = make_character_array($string2);
	
	ksort($resultArray1);
	ksort($resultArray2);
	var_dump($resultArray1);
	var_dump($resultArray2);
	if ($resultArray1 === $resultArray2) {
		return TRUE;	
	}
	else {
		return FALSE;
	}
}
function make_character_array($string) {
	// look at both strings and make arrays that contain their character counts
	// for each character in the string
	$length = strlen($string);
	for ($i = 0; $i < $length; $i++) {
		$current_character = substr($string, $i, 1);
		$results[$current_character] = $results[$current_character] + 1;
	}
	return $results;
}

$result = is_permutation_alt($argv[1], $argv[2]);
if ($result == TRUE) {
	echo 'The strings are permuted!';
}	
else {
	echo 'The strings are not permuted.  Nooooo!';
}
?>
