<?php

function get_parents($name) { //25pts
//mengambil semua parent dari input mulai dari direct-parent sampai root member
//mengembalikan array of string berisi nama parent urut dari yang paling dekat
// Create database connection
$dbConnection = new mysqli("localhost", "root", "", "griyabayar");

// Get the result from DB Table
$records = $dbConnection->query("SELECT m1.name as child_name
                                from member m1 join member m2 on (m2.parent_id = m1.id) 
                                where m2.name = '$name' GROUP BY m2.parent_id");

// Fetch all records
// @MYSQLI_ASSOC - Columns are returned into the array having the field name as the array index.
$parents = mysqli_fetch_all($records, MYSQLI_ASSOC);

// Close the connection
$dbConnection->close();

return $parents;
}
?>