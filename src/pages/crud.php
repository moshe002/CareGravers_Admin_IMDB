<?php
include("database.php");
//DECEASED INFORMATION
    // Update operation in DECEASED-INFORMATION
    if (isset($_POST['update'])) {
        $deceasedID = $_POST['deceasedID'];
        $nameOfDeceased = $_POST['nameOfDeceased'];
        $dateOfBirth = $_POST['dateOfBirth'];
        $dateOfDeath = $_POST['dateOfDeath'];
        $block = $_POST['block'];
        $lot = $_POST['lot'];
        $gravesiteClassification = $_POST['gravesiteClassification'];

        // Update query
        $updateSql = "UPDATE deceased
                    JOIN gravesite ON deceased.deceasedID = gravesite.deceasedID
                    SET
                        deceased.nameOfDeceased = '$nameOfDeceased',
                        deceased.dateOfBirth = '$dateOfBirth',
                        deceased.dateOfDeath = '$dateOfDeath'   ,
                        gravesite.graveCoordinates = CONCAT('$block',',', '$lot'),
                        gravesiteclassification.graveClassification = '$gravesiteClassification'
                    WHERE deceased.deceasedID = $deceasedID";

        $updateResult = mysqli_query($conn, $updateSql);

        if ($updateResult) {
            echo "Record updated successfully";

            // JavaScript redirection
            echo '<script>window.location.href = "deceased-info.php";</script>';
            exit;
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
    // Delete operation IN DECEASED INFORMATION
    if (isset($_GET['delete'])) {
        $deceasedID = $_GET['delete'];

        $deleteSql = "DELETE FROM deceased WHERE deceasedID = $deceasedID";
        $deleteResult = mysqli_query($conn, $deleteSql);

        if ($deleteResult) {
            echo "Record deleted successfully";

            // JavaScript redirection
            echo '<script>window.location.href = "deceased-info.php";</script>';
            exit;
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }
//END OF DECEASED INFORMATION



//PRICING
    //Update operaton on Pricing
    if (isset($_POST['update_pricing'])) {
        $gravesiteID = $_POST['graveClassID'];
        $graveType = $_POST['graveClassification'];
        $price = $_POST['price'];

        // Update query
        $update = "UPDATE gravesiteclassification
        SET
            gravesiteclassification.graveClassification = '$graveType',
            gravesiteclassification.price = '$price'
        WHERE gravesiteclassification.graveClassID = $gravesiteID";

        $updateResult = mysqli_query($conn, $update);

        if ($updateResult) {
            echo "Record updated successfully";

            // JavaScript redirection
            echo '<script>window.location.href = "pricing.php";</script>';
            exit;
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }

    // Delete operation IN PRICING
    if (isset($_GET['delete'])) {
        $gravesiteID = $_GET['delete'];

        $deleteSql = "DELETE FROM gravesiteclassification WHERE gravesiteclassification.graveClassID = $gravesiteID";
        $deleteResult = mysqli_query($conn, $deleteSql);

        if ($deleteResult) {
            echo "Record deleted successfully";

            // JavaScript redirection
            echo '<script>window.location.href = "pricing.php";</script>';
            exit;
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

    //Create operation in Pricing
    if (isset($_GET['add_new'])) {
        $gravesiteID = $_GET['id'];
        $gravesiteClassification = $_GET['gc'];
        $price = $_GET['p'];

        // Prepare the values for insertion
    $gravesiteID = mysqli_real_escape_string($conn, $gravesiteID);
    $gravesiteClassification = mysqli_real_escape_string($conn, $gravesiteClassification);
    $price = mysqli_real_escape_string($conn, $price);

    // Create the INSERT query
    $insertSql = "INSERT INTO gravesiteclassification VALUES ('$gravesiteID', '$gravesiteClassification', '$price')";
    // Execute the query
    $createResult = mysqli_query($conn, $insertSql);

    if ($createResult) {
        echo "Record created successfully";

        // JavaScript redirection
        echo '<script>window.location.href = "pricing.php";</script>';
        exit;
    } else {
        echo "Error creating record: " . mysqli_error($conn);
    }
    }
//END OF PRICING

//RESERVATION
    //Delete Operation
    

//END OF RESERVATION
?>