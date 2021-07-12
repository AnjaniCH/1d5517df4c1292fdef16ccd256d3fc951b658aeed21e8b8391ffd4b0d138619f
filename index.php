<?php
// Create database connection using config file
include("get_parents.php");
include("get_children.php");
include("get_tree.php");

// Output the response
header('Content-Type: application/json');

$tree = get_tree();
echo json_encode($tree);
echo "\n \n";
/* akan menulis :
{"name":"root","children":[{"name":"William","children":[{"name":"Richard",
"children":[{"name":"Summer","children":[]}]},{"name":"Ryan","children":[]}]},
{"name":"Jessica","children":[{"name":"Marge","children":[{"name":"Geraldine",
"children":[{"name":"Drake","children":[]}]},{"name":"John","children":[]}]}]},
{"name":"Samantha","children":[{"name":"James","children":[]},{"name":"April",
"children":[{"name":"Bach","children":[]}]},{"name":"Charles","children":[]}]},
{"name":"Maya","children":[{"name":"Gerald","children":[]},{"name":"Andrea",
"children":[{"name":"Dean","children":[]},{"name":"Andre","children":[
{"name":"Neil","children":[{"name":"Derp","children":[{"name":"Derpina",
"children":[]}]}]}]},{"name":"Josephine","children":[]}]}]}]}
*/
$tree2 = get_tree('Andre');
echo json_encode($tree2);
echo "\n \n";
/* akan menulis :
{"name":"Andre","children":[{"name":"Neil","children":[{"name":"Derp","children":[
{"name":"Derpina","children":[]}]}]}]}
*/
$parents = get_parents('Marge');
echo json_encode($parents);
echo "\n \n";
/* akan menulis : ["Jessica", "root"] */
$parents2 = get_parents('Derpina');
echo json_encode($parents2);
echo "\n \n";
/* akan menulis : ["Derp", "Neil", "Andre", "Andrea", "Maya", "root"] */
echo hex2bin('74686520616e7377657220697320372c2062757420686f773f');
echo "\n \n";
$children = get_children('Samantha');
echo json_encode($children);
echo "\n \n";
/* akan menulis : ["James", "April", "Charles"] */
$children2 = get_children('John');
echo json_encode($children2)
?>

