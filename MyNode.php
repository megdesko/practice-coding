<?php
// Author: Marguerite Desko
// This is a simple class that holds nodes for a
// linked list

class MyNode {
// list class vars here
var $nextNode; // this is the pointer to the next node in the list
var $value; // this is the value at this node
static $nodeCount; // count of the nodes in the list

function __construct() {
	// add 1 to the nodeCount every time one is added
	self::$nodeCount ++;
}

function getvalue() {
	// returns the value at this node
	return $this->value;
}

} //end class MyNode
?>
