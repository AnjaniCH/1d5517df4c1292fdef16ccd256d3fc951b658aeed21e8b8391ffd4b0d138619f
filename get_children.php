<?php

function get_children($name) { //15pts
//mengambil semua direct-child dari input
//mengembalikan array of string yang berisi daftar nama child
// Create database connection
$dbConnection = new mysqli("localhost", "root", "", "griyabayar");

// Get the result from DB Table
$records = $dbConnection->query("SELECT m2.name as parent_name from member m2 
                                join member m1 on (m1.id = m2.parent_id) where m1.name = '$name'");

// Fetch all records
// @MYSQLI_ASSOC - Columns are returned into the array having the field name as the array index.
$children = mysqli_fetch_all($records, MYSQLI_ASSOC);

// Close the connection
$dbConnection->close();

return $children;
}
?>