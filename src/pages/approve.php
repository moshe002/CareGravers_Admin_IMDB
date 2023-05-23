<?php

    // Connect to the database and update the approval column
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "caregraver";

    $g_ID= $_GET['gravesiteID'];
    $userID=$_GET['userID'];
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "INSERT INTO r_gravestatus (gravesiteID, userID) VALUES ($g_ID, $userID)";
    $sql2 = "UPDATE requestreservation SET approval='1' WHERE requestreservation.userID = $userID";
    if ($conn->multi_query($sql . ';' . $sql2) === TRUE) {
        echo "Approval updated successfully";
        header("Location: reservation.php");
        exit();
    } else {
        echo "Error updating approval: " . $conn->error;
    }
    
?>