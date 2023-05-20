<?php
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