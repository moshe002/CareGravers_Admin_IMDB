<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "caregraver";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data from 'table1'
$sql1 = "SELECT deceasedID, nameOfDeceased, dateOfBirth, dateOfDeath FROM deceased";
$result1 = $conn->query($sql1);

// SQL query to fetch data from 'table2'
$sql2 = "SELECT graveCoordinates, gravesiteClassification FROM gravesite";
$result2 = $conn->query($sql2);

// Fetch data from 'table1'
$table1Data = array();
if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
        $table1Data[] = $row;
    }
}

// Fetch data from 'table2'
$table2Data = array();
if ($result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        $table2Data[] = $row;
    }
}

// Combine the fetched data from both tables
$combinedData = array(
    'table1' => $table1Data,
    'table2' => $table2Data
);

$conn->close();
?>