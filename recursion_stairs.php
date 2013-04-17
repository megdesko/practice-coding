<?php
// Author: Marguerite Desko
// Purpose: practice recursion algorithms
// Question: imagine someone can run up stairs 1, 2 or 3 steps at a time for n
// steps



function countWays($n) {
	// base case: there are less than zero steps, so we don't need to take any
	// steps; return 0
	if ($n < 0) {
		return 0;
	}
	// base case:  there are exactly zero steps left at this point, so we don't
	// need to keep going
	else if ($n == 0) {
		return 1;
	}	
	// there are more steps to go, so we can keep trying to take different
	// numbers of steps
	else {
		return (countWays($n-1) + countWays($n -2) + countWays($n-3));
	}


}

// test
$n = 5;
$counted = countWays($n);
echo 'Counted :'.$counted.' ways.';



?>
