<?php
// Author: Marguerite Desko
// Purpose: generate the power sets for incoming lists of stuff 


function make_power_set($incoming) {
// base case: return an empty array if the incoming array is empty
if (count($incoming) == 0) {
	$retArr[] = array();
	return $retArr;
}

else {
	// take one item out and put it aside for later 
	$holdover[] = array_pop($incoming);
	// call the make power set function on the rest of the array
	$newSet = make_power_set($incoming);
	// copy the returned values
	$resultSet = $newSet;
	// and then go through them, adding the held over item to each array/ result
	// set
	foreach ($newSet as $new) {
		$resultSet[] = array_merge($new, $holdover);
	}
// and then return the result set
return $resultSet;

}

}

// TEST

$list = array('1','2','3');
$answer = make_power_set($list);
print_r( $answer);


?>
