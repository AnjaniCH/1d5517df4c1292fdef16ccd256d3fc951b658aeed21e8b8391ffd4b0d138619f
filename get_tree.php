<?php

function get_tree($name = "root", $parentId = 0) { //40pts
//mengambil struktur tree dari database dengan top level item sesuai input
//mengembalikan assoc array dengan property nama dan children
//dimana children adalah array of assoc array berisi child dibawah member ybs
//$parentId = 0;

$treeArray = array();
// Create database connection
$dbConnection = new mysqli("localhost", "root", "", "griyabayar");

// Get the result from DB Table
$records = $dbConnection->query("SELECT id, parent_id, name FROM member ORDER BY parent_id where name = $name ");

// Fetch all records
// @MYSQLI_ASSOC - Columns are returned into the array having the field name as the array index.
$treeArray = mysqli_fetch_all($records, MYSQLI_ASSOC);

// Close the connection
$dbConnection->close();


$output = [];

    // Read through all nodes of the tree
    foreach ($treeArray as $node) {

        // If the node parent is same as parent passed in argument
        if ($node['parent_id'] == $parentId) {

            // Get all the children for that node, using recursive method
            $children = get_tree($treeArray, $node['id']);

            // If children are found, add it to the node children array
            if ($children) {
                $node['children'] = $children;
            }

            // Add the main node with/without children to the main output
            $output[] = $node;

            // Remove the node from main array to avoid duplicate reading, speed up the process
            unset($node);
        }
    }
    return $output;
}
?>