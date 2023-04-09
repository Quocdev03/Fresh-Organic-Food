<?php
// Select data from a table
$sql = "SELECT * FROM table_name";
$result = mysqli_query($conn, $sql);

// Insert data into a table
$sql = "INSERT INTO table_name (column1, column2, column3) VALUES ('value1', 'value2', 'value3')";
if (mysqli_query($conn, $sql)) {
   echo "New record created successfully";
} else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Update data in a table
$sql = "UPDATE table_name SET column1='new_value' WHERE some_column='some_value'";
if (mysqli_query($conn, $sql)) {
   echo "Record updated successfully";
} else {
   echo "Error updating record: " . mysqli_error($conn);
}

// Delete data from a table
$sql = "DELETE FROM table_name WHERE some_column='some_value'";
if (mysqli_query($conn, $sql)) {
   echo "Record deleted successfully";
} else {
   echo "Error deleting record: " . mysqli_error($conn);
}
