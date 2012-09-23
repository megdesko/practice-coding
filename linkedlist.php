<?php
// Author: Marguerite Desko
// This program creates a linked list with numeric values, and also will search
// for a particular value in the list
// can run on its own, or take the desired # of nodes and the value
// to look for as parameters

require_once("MyNode.php");

//this function looks for a particular value in the list
function inList($val, $head) {
	$current = $head;
	// while there are still list elements/nodes after this one
	// keep looking for the value
	while ($current->nextNode) {
		if ($current->value == $val) {
		return $val.' was found in the list.'."\n";
		}
		else if ($debug) {
			echo $val.'has not been found yet'."\n";
		}
		// once the current node has been checked for the value
		// make the current node the next one in the list
		$current = $current->nextNode;
	}
	return $val." was not found in the list.\n";
}

// this function creates the linked list with the $desiredNodes
// number of nodes in it
function createList($desiredNodes) {
	for ($i; $i < $desiredNodes; $i++) {
		$newNode = new MyNode();
		if (! $newNode) {
			echo 'This is broken! New node could not be created.';
			exit;
		}
		// if the new node was generated, set it's value and pointer
		// to the next node
		$newNode->value = rand(1, ($desiredNodes * 2));
		$newNode->nextNode = $head;
		// then set the head (end of list) node to the new node created
		$head = $newNode;
		if ($debug) echo 'Value of head is '.$head->value."\n";
		if ($debug) echo 'The value of the next node is '.$head->nextNode->value."\n";
	}
	return ($head);	
}

// set the # of nodes and search value from command line
$desiredNodes = $argv[1];
$searchValue = $argv[2];

// if they do not contain values, set $desiredNodes and $searchValue
if (! $desiredNodes) {
	$desiredNodes = 1000;
}

if (!$searchValue) {
	$searchValue = rand(1, $desiredNodes);
}

// create a list with the desired number of nodes
$head = createList($desiredNodes);

echo 'Searching for '.$searchValue.' in the list.'."\n";
// search for the $searchValue in the list
$result = inList($searchValue, $head);
echo $result;



?>