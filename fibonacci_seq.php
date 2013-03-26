<?php
// Author: M Desko
// Purpose: write a function that returns the nth fibonacci number

// recursive function to return the nth fibonacci number
// as written, it's pretty slow
function get_fibonacci($n) {
// base case: if n is 0, return 0
if ($n == 0) {
	return 0;
}
// base case: if n is 1, return 1
else if ($n == 1) {
	return 1;
}
// otherwise, the fibonacci # is the sum of the two previous ones
else if ($n > 1) {
	$number = get_fibonacci($n-1) + get_fibonacci($n -2);
	echo 'Incoming n = '.$n.', about to return '.$number."\n";
	return $number;
}
}

// a non-recursive function to return nth fibonacci number
function fibonacci($n) {
// we know these coming into it
$fib[0] = 0;
$fib[1] = 1;

// store up the fibonacci numbers as we calculate them
if ($n > 1) {
	for ($i = 2; $i <= $n; $i++) {
		$fib[$i] = $fib[$i-1] + $fib[$i - 2];
	}
}
// and return the nth
return $fib[$n];
}


// TEST

$n = 10;
$number = get_fibonacci($n);
echo 'get_fibonacci on '.$n.' returns '.$number."\n";
$number = fibonacci($n);
echo 'fibonacci on '.$n.' returns '.$number."\n";
?>
