<?php
// Create database connection using config file
include("get_parents.php");
include("get_children.php");
include("get_tree.php");

// Output the response
header('Content-Type: application/json');

$parents1 = get_parents('Marge');
echo json_encode($parents1);
/* akan menulis : ["Jessica", "root"] */
?>

