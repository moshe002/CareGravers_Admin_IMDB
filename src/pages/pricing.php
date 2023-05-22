<?php
include("database.php");
$sql = "SELECT * FROM gravesite WHERE 1";
$result = mysqli_query($conn, $sql);
include("crud.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PRICING </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta3/css/all.css" integrity="...your-integrity-value-here..." crossorigin="anonymous" />
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!--Replace with your tailwind.css once created-->
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/deceased-info.css">
</head>
<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
<!--Container-->
<div class="container p-16" id="users">
    <h3><strong>PRICING</strong></h3><br><br>
    <!--Card-->
    <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow shadow-2xl bg-white">
    <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead class="border-b border-primary-200 bg-primary-100 text-neutral-800">
            <th>Grave Type</th>
            <th>Price Per Annum</th>
            <th>Action</th>
            </thead>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        
                        <td><?php 
                               $type = $row["gravesiteClassification"];

                               switch ($type) {
                                 case "LL":
                                   echo "Lot Lawn";
                                   break;
                                 case "GN":
                                   echo "Garden Niche";
                                   break;
                                 case "FE":
                                   echo "Family Estate";
                                   break;
                               }
                            ?>
                        </td>
                        <td><?php echo $row["price"]; ?></td>
                        <td>
                            <!-- Trigger/Open The Modal -->
                            <a id="myBtn" class="open-modal-btn text-blue-400 hover:text-pink-500 mx-2">
                                <i class="far fa-edit"></i>
                            </a>
                            <a class="text-blue-400 hover:text-pink-500 mx-2"
                               href="?delete=<?php echo $row['deceasedID']; ?>"
                               onclick="return confirm('Are you sure you want to delete <?php echo $row['gravesiteClassification']; ?>? The data will be permanently removed. This action cannot be undone.')">
                                <i class="fa-regular fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </div>
    <!--/Card-->
</div>
<!--/container-->
<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function () {
        var table = $('#example').DataTable({
            responsive: true
        })
            .columns.adjust()
            .responsive.recalc();
    });
</script>
</body>
</html>
