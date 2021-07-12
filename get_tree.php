<?php

$treeArray = get_tree();

function tree($treeArray, $parentId = 0)
{
    $output = [];

    // Read through all nodes of the tree
    foreach ($treeArray as $node) {

        // If the node parent is same as parent passed in argument
        if ($node['parent_id'] == $parentId) {

            // Get all the children for that node, using recursive method
            $children = tree($treeArray, $node['id']);

            // If children are found, add it to the node children array
            if ($children) {
                $node['name'] = $children;
            }

            // Add the main node with/without children to the main output
            $output[] = $node;

            // Remove the node from main array to avoid duplicate reading, speed up the process
            unset($node);
        }
    }

    return $output;
}

function get_tree($name = "root")
{
    // Create database connection
    $dbConnection = new mysqli("localhost", "root", "", "griyabayar");

    // Get the result from DB Table
    $records = $dbConnection->query("SELECT m1.name as parent_name, m2.name as child_name FROM member m1
    LEFT JOIN member m2 ON m2.parent_id = m1.id WHERE m1.name = '$name'");

    // Fetch all records
    // @MYSQLI_ASSOC - Columns are returned into the array having the field name as the array index.
    $output = mysqli_fetch_all($records, MYSQLI_ASSOC);

    // Close the connection
    $dbConnection->close();

    return $output;
}
?>