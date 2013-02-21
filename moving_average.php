<?php
/*
Author: Marguerite Desko
Moving average:  takes an input array and # of days to include in moving
average; returns average for that # of days, if greater than days that have
occurred so far.
*/

function movingAverage($input, $kDays) {
	// initialize the Day Count at zero before starting so fresh slate
	$Day = 0;
	// 	count the # of items in the input array
	$count = count($input);
	// iterate through the different days' worth of data
	for ($i = 0; $i < $count; $i++) {
		// set the numerator to zero to start a round of work
		$numerator = 0;
		// increment the Day count
		$Day ++;
		// if the number of days is less than the k totay we're looking for, use
		// all available information
		if ($Day < $kDays) {
			// add up all array elements until this day for the numerator
			for ($j = 0; $j < $Day; $j++) {
				$numerator += $input[$j];
			}
		}
		// if the current day we're looking at is >= k days input, use only the
		// last k days of data (including current day)
		else if ($Day >= $kDays) {
			// set Day count = kDays since it will never be bigger than this
			$Day = $kDays;
			// subtract days to get the numerator, by adding those array
			// elements
			for ($j = 0; $j < $kDays; $j++) {
				$numerator += $input[$i - $j];
			}
		}
	// the output at this position (assumed to be the same as in the first
	// array, because of the iteration) is the summed numerator divided by the
	// correct # of days
	$output[] = round($numerator / $Day, 2);
	}
	return $output;
}


// Test case
$input[] = 7.0;
$input[] = 1.0;
$input[] = 4.0;
$input[] = 6.0;
$input[] = 9.0;
$input[] = 4.0;
$input[] = 2.0;
$kDays = 4;
$output = movingAverage($input, $kDays);
print_r($output);
?>
