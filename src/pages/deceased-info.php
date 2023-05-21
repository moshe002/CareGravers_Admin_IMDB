<?php
include("database.php");
$sql = "SELECT deceased.deceasedID, deceased.nameOfDeceased, deceased.dateOfBirth, deceased.dateOfDeath, gravesite.graveCoordinates, gravesite.gravesiteClassification FROM deceased INNER JOIN gravesite ON deceased.gravesiteID = gravesite.gravesiteID";
$result = mysqli_query($conn, $sql);

include("crud.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>USERS </title>
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
    <style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
</style>
</head>
<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
<!--Container-->
<div class="container p-16" id="users">
    <h3><strong>DECEASED INFORMATION</strong></h3><br><br>
    <!--Card-->
    <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow shadow-2xl bg-white">
        <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead class="border-b border-primary-200 bg-primary-100 text-neutral-800">
            <th>ID</th>
            <th>Name</th>
            <th>Date Of Birth</th>
            <th>Date Of Death</th>
            <th>Block</th>
            <th>Lot</th>
            <th>Grave Type</th>
            <th>Action</th>
            </thead>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    // Split the graveCoordinates
                    $graveCoordinates = $row['graveCoordinates'];
                    $split = explode(',', $graveCoordinates);
                    $block = trim($split[0]);
                    $lot = trim($split[1]);
                    ?>
                    <tr>
                        <td><?php echo $row["deceasedID"]; ?></td>
                        <td><?php echo $row["nameOfDeceased"]; ?></td>
                        <td><?php echo $row["dateOfBirth"]; ?></td>
                        <td><?php echo $row["dateOfDeath"]; ?></td>
                        <td><?php echo $block; ?></td>
                        <td><?php echo $lot; ?></td>
                        <td><?php echo $row["gravesiteClassification"]; ?></td>
                        <td>
                            <!-- Trigger/Open The Modal -->
                            <a id="myBtn" class="open-modal-btn text-blue-400 hover:text-pink-500 mx-2">
                                <i class="far fa-edit"></i>
                            </a>
                            <a class="text-blue-400 hover:text-pink-500 mx-2"
                               href="?delete=<?php echo $row['deceasedID']; ?>"
                               onclick="return confirm('Are you sure you want to delete<?php echo $row['nameOfDeceased']; ?>? The data will be permanently removed. This action cannot be undone.')">
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

<!-- The Modal -->
<div id="myModal" class="modal relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
  <div class="fixed inset-0 z-10 overflow-y-auto">
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
      <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-300 sm:mx-0 sm:h-10 sm:w-10">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
            </svg>
            </div>
            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
              <h3 class="text-2xl font-semibold leading-6 text-gray-900" id="modal-title">Edit Deceased Information</h3>
              <div class="mt-2 gap-3">
                <p class="text-sm text-gray-500">You are editing the Deceased Information. Once Updated, the action cannot be undone.</p><br>
                <form id="editForm" method="POST" action="crud.php">
                    <label class="text-lg font-semibold leading-6 text-gray-900" for="deceasedID">Deceased ID:</label>
                    <input class="border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500" type="text" id="deceasedID" name="deceasedID" readonly><br>
                    <br>
                    <label class="text-lg font-semibold leading-6 text-gray-900" for="nameOfDeceased">Name of Deceased:</label>
                    <input type="text" id="nameOfDeceased" name="nameOfDeceased"><br>
                    <br>
                    <label class="text-lg font-semibold leading-6 text-gray-900" for="dateOfBirth">Date of Birth:</label>
                    <input type="date" id="dateOfBirth" name="dateOfBirth"><br>
                    <br>
                    <label class="text-lg font-semibold leading-6 text-gray-900" for="dateOfDeath">Date of Death:</label>
                    <input type="date" id="dateOfDeath" name="dateOfDeath"><br>
                    <br>
                    <label class="text-lg font-semibold leading-6 text-gray-900" for="dateOfDeath">Block:</label>
                    <input type="text" id="block" name="block"><br>
                    <br>
                    <label class="text-lg font-semibold leading-6 text-gray-900" for="dateOfDeath">Lot:</label>
                    <input type="text" id="lot" name="lot"><br>
                    <br>
                    <label class="text-lg font-semibold leading-6 text-gray-900" for="gravesiteClassification">Gravesite Classification:</label>
                    <input type="text" id="gravesiteClassification" name="gravesiteClassification"><br>

                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
          <button type="submit" name="update" class="inline-flex w-full justify-center rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-100 hover:text-black sm:ml-3 sm:w-auto">Update</button>
          <span type="button" class="close mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</span>
        </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
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
<script>
    // Open modal on button click
    $('.open-modal-btn').click(function () {
            // Get the row data
            var row = $(this).closest('tr');
            var deceasedID = row.find('td:eq(0)').text().trim();
            var nameOfDeceased = row.find('td:eq(1)').text().trim();
            var dateOfBirth = row.find('td:eq(2)').text().trim();
            var dateOfDeath = row.find('td:eq(3)').text().trim();
            var block = row.find('td:eq(4)').text().trim();
            var lot = row.find('td:eq(5)').text().trim();
            var gravesiteClassification = row.find('td:eq(6)').text().trim();

            // Set the form values
            $('#deceasedID').val(deceasedID);
            $('#nameOfDeceased').val(nameOfDeceased);
            $('#dateOfBirth').val(dateOfBirth);
            $('#dateOfDeath').val(dateOfDeath);
            $('#block').val(block);
            $('#lot').val(lot);
            $('#gravesiteClassification').val(gravesiteClassification);

            // Show the modal
            $('#myModal').css('display', 'block');
        });

        // Close modal on close button click
        $('.close').click(function () {
            $('#myModal').css('display', 'none');
        });

        // Close modal when clicking outside the modal
        $(window).click(function (event) {
            if (event.target == $('#myModal')[0]) {
                $('#myModal').css('display', 'none');
            }
        });
</script>
</body>
</html>
