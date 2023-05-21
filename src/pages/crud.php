<?php
include("database.php");
// Update operation
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
                    gravesite.gravesiteClassification = '$gravesiteClassification'
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
// Delete operation
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
?>