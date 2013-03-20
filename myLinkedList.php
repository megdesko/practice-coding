<?php
// Author: Marguerite Desko
// implement a singly linked list, with some other methods

class myNode {
	// variable to hold the data
	var $data = null;
	// variable to hold the pointer to the next object
	var $next = null;

	// constructor for myNode class
	function __construct($data) {
		$this->data = $data;
		$this->next = null;
	}
} // end class myNode

class myList {
	// variable to hold first Node
	var $firstNode;
	// variable to hold last node
	var $lastNode;
	// variable to hold the count of items in the list
	var $count;

	function __construct() {
	// set all class variables to their value before the list has any items in
	// it
	$this->firstNode = null;
	$this->lastNode = null;
	$this->count = 0;
	}

	function insertFirst($data) {
		// create the node and set its properties
		$currentNode = new myNode($data);
		$currentNode->next = null;
		// then set the list properties for a single item list
		$this->firstNode = $currentNode;
		$this->lastNode = $currentNode;
		$this->count++;
	}
	
	function insertLast($data) {
		if ($this->firstNode == null) {
			$this->insertFirst($data);
		}
		else {
			// create the node and set its properties
			$currentNode = new myNode($data);		
			$currentNode->next = null;
			// set the existing last node's "next" value to the current node,
			// since we're adding to the end of the list
			$this->lastNode->next = $currentNode;			
			// then make the current node the last node
			$this->lastNode = $currentNode;
			
			$this->count++;
		}
	}
	function deleteNode($value) {
		$current = $this->firstNode;
		$previous = null;

		while ($current->data != $value) {
			if ($current->next == null) {
			return null;
			}
			$previous = $current;
			$current = $previous->next;
		}
		if ($current->data == $this->firstNode->data) {
			if ($current->data == $this->lastNode) {
			$this->count--;
			return null;
			}
			$store = $this->firstNode;
			$this->firstNode = $store->next;
			$this->count--;
		}
		else {
			$previous->next = $current->next;
			$this->count--;
		}
	}
	
	function readList() {
		$current = $this->firstNode;
		while ($current != null) {
			$retstr .= $current->data.' ';
			$current = $current->next;
		}
		return $retstr;
	}


	function deleteDupeNodes() {
		$current = $this->firstNode;
		$previous = $this->firstNode;
		$checking = $this->firstNode;
		$checkingPrevious = $this->firstNode;
		
		while ($current != null) {
			$checking = $current->next;
			$checkingPrevious = $current;
			while ($checking != null) {
				if ($checking->data == $current->data) {
					$checkingPrevious->next = $checking->next;
					$this->count--;
				}
				$checkingPrevious = $checking;
				$checking = $checking->next;
			}
			$previous = $current;
			$current = $current->next;
		}

	}
	
	// find the element that is k places from the end of the linked list
	function findKthFromEnd($k) {
		$current = $this->firstNode;
		$kth = null;
		while ($current != null) {
			// when the counter is the same as k, start moving along in sync
			// with outer counter, k spaces behind
			if ($counter == $k) {
				$kth = $this->firstNode;
			}
			// increment the counter with each go-round
			if ($counter > $k) {
				$kth = $kth->next;
			}
			// increment the counter for the next round
			$current = $current->next;
			$counter++;
		}
		// return the data at the kth to end node
		return $kth->data;
	}

// function to move values < value k before any with value >= k
	function partitionList($k) {
		$current = $this->firstNode;
		$start = new myList();
		$end = new myList();
		while ($current != null) {
			if ($current->data < $k) {
				$start->insertLast($current->data);
			}
			else if ($current->data >= $k) {
				$end->insertLast($current->data);
			}
			$current = $current->next;
		}
		$start->lastNode->next = $end->firstNode;
		return $start;

	}
}



// TEST

$list = new myList();
for ($i = 0; $i <= 100; $i++) {
	$list->insertLast(rand(1,95));
}
echo 'The count is '.$list->count."\n";
//$list->deleteNode('16');

echo $list->readList()."\n";

//$list->deleteDupeNodes();

//`echo $list->readList()."\n";
echo 'The count is '.$list->count."\n";

echo $list->findKthFromEnd('3');

$sortList = $list->partitionList(10);
echo $sortList->readList()."\n";
?>
