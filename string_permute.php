<?php
// Author: M Desko
// Purpose: return all permutations (array) of a string.

function permute($word) {
    $length = strlen($word);
    // if the length of the string is 1, there aren't any permutations for it.
	// so return the incoming string (BASE CASE)
	// Note: need to return as an array to be a good arg for the rest of permute
	// function when returned
	if ($length === 1) {
		return array($word);
	}		
	else {
		for ($i = 0; $i < $length; $i++) {
			// separate out each letter in the string from the others in the
			// string
			$singleLetter = substr($word, $i, 1);
			$restOfString = substr($word, 0, $i) . substr($word, $i+1);
			
			// then permute the rest of the string
			$permutedWord = array();
			$permutedWord = permute($restOfString);

			//then move the single letter we put aside "between" each position
			//in the string returned by permute
			foreach ($permutedWord as $w) {
				for ($j = 0; $j < strlen($w); $j++) {
				// note: could check to see if value is already in returned
				// array to prevent duplicates
					$returnArray[] = substr($w, 0, $j) . $singleLetter 
								  . substr($w, $j);
				}
			}
		}
		return $returnArray;
	}
}

// test
$returned = permute($argv[1]);
print_r($returned);
?>
