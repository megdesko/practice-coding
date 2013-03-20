<?php
// author: M Desko
// purpose: do a factorial on a number passed into the function

function factorial($number) {
// if the nubmer is 1, return 1 (can't go lower)
if ($number == 1) {
	return 1;
}
// otherwise, take the current number and multiply it
// by the result of calling this function on itself.  Yippee!
else {
	// call this function within itself to get to the answer
	$factorial = $number * (factorial($number -1));
	// and then return the answer
	return $factorial;
}
}


// TEST CASE

$number = 20;
$returned = factorial($number);
echo 'Returned value is '.$returned;


?>

