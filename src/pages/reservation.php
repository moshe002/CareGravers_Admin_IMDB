<?php
  include("database.php");
  $sql = "SELECT rr.userID, rr.approval, rr.gravesiteID, u.fName, u.lName, u.userEmail, gs.graveClassID, gc.graveClassification, gs.graveCoordinates, gs.availability
  FROM requestreservation rr
  INNER JOIN user u ON rr.userID = u.userID
  INNER JOIN gravesite gs ON rr.gravesiteID = gs.graveClassID
  INNER JOIN gravesiteclassification gc ON gs.graveClassID = gc.graveClassID";
  $result = mysqli_query($conn, $sql);
  $fullName = "";
  include("crud.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wid  th=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservations</title>
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
<body>
    <!-- main div -->
    <div class="flex flex-row h-screen w-full text-gray-700 tracking-wider leading-normal">
        <!-- sidebar -->
		<div class="flex flex-col items-center bg-blue-400 h-full overflow-auto w-1/4">
			<!-- admin image and name -->
			<div class="flex flex-col items-center py-5 text-center w-full">
				<img src="../assets//images//admin_pic.png" alt="admin_pic">
				<h1 class="text-2xl text-white font-semibold mt-3">Admin</h1>
			</div>
			<!-- end of admin image and name -->
			<!-- sidebar buttons -->
			<div class="flex flex-col gap-3 py-9 w-full h-full justify-evenly items-start g-white/10">
				<button 
					id="dashboard"
					class="flex gap-3 p-2 text-white font-semibold w-full outline-none focus:bg-white focus:text-black duration-300" 
					onclick="(function(){
						window.location.href = 'homepage.php';
					})();" 
					>
					<img id="dashboard_img" src="../assets//icons//white_dashboard_icon.png" alt="dashboard_icon">
					Dashboard
				</button>
				<button 
					id="users"  
					class="flex gap-3 p-2 text-white font-semibold w-full outline-none focus:bg-white focus:text-black duration-300"
					onclick="(function(){
						window.location.href = 'users.php';
					})();" 
					>
					<img id="users_img" class="ml-0.5" src="../assets//icons//white_users_icon.png" alt="users_icon">
					Users
				</button>
				<button 
					id="deceased_info"
					class="flex gap-3 p-2 text-white font-semibold w-full outline-none focus:bg-white focus:text-black duration-300" 
					onclick="(function(){
						window.location.href = 'deceased-info.php';
					})();" 
					>
					<img id="deceased_info_img" src="../assets//icons//white_deceased_icon.png" alt="deceased_icon">
					Deceased Information
				</button>
				<button 
					id="explorer"
					class="flex gap-4 p-2 text-white font-semibold w-full outline-none focus:bg-white focus:text-black duration-300" 
					onclick="(function(){
						window.location.href = 'explorer.php';
					})();" 
					>
					<img id="explorer_img" class="ml-0.5" src="../assets//icons//white_explorer_icon.png" alt="explorer_icon">
					Explorer
				</button>
				<button 
					id="inquiries" 
					class="flex gap-4 p-2 text-white font-semibold w-full outline-none focus:bg-white focus:text-black duration-300" 
					onclick="(function(){
						window.location.href = 'inquiries.php';
					})();" 
					>
					<img id="inquiries_img" class="ml-0.5" src="../assets//icons//white_inquiries_icon.png" alt="inquiries_icon">
					Users Inquiries
				</button>
				<button 
                    autofocus
					id="reservations" 
					class="flex gap-4 p-2 text-white font-semibold w-full outline-none focus:bg-white focus:text-black duration-300"  
					onclick="(function(){
						window.location.href = 'reservation.php';
					})();" 
					>
					<img id="reservations_img" class="ml-0.5" src="../assets//icons//dark_reservations_icon.png" alt="reservations_icon"> 
					Reservations
				</button>
				<button 
					id="bookings" 
					class="flex gap-2.5 p-2 text-white font-semibold w-full outline-none focus:bg-white focus:text-black duration-300" 
					onclick="(function(){
						window.location.href = 'bookings.php';
					})();" 
					>
					<img id="bookings_img" class="ml-0.5" src="../assets//icons//white_bookings_icon.png" alt="bookings_icon"> 
					Bookings
				</button>
				<button 
					id="pricing" 
					class="flex gap-3 p-2 text-white font-semibold w-full outline-none focus:bg-white focus:text-black duration-300" 
					onclick="(function(){
						window.location.href = 'pricing.php';
					})();" 
					>
					<img id="pricing_img" class="ml-0.5" src="../assets//icons//white_pricing_icon.png" alt="pricing_icon"> 
					Pricing
				</button>
				<button 
					id="payments" 
					class="flex gap-3 p-2 text-white font-semibold w-full outline-none focus:bg-white focus:text-black duration-300" 
					onclick="(function(){
						window.location.href = 'payments.php';
					})();" 
					>
					<img id="payments_img" class="ml-0.5" src="../assets//icons//white_payments_icon.png" alt="payments_icon"> 
					Payments
				</button>
			</div>
			<!-- end of sidebar buttons -->
		</div>
		<!-- end of sidebar -->
        <div class="w-full">
            <!-- top navbar -->
            <div class="flex justify-between items-center h-1/6 w-full shadow-2xl">
                    <h1 class="ml-16 font-bold text-2xl">CareGraver</h1>
                    <!-- the uh, account button something nga drop down -->
                    <div class="flex gap-10 items-center justify-center mr-24">
                        <div class="relative">
                            <button 
                                class="opacity-75 text-lg font-medium p-2 rounded-md text-center inline-flex items-center text-white bg-blue-400 hover:opacity-100 focus:bg-blue-400 focus:text-white duration-150" 
                                type="button" 
                                onclick="onOpen()"> 
                                <h1>Hello,&nbsp;</h1>
                                <h1 name="username" class=""><?php   
                                    //echo $loggedInUser["fName"]." ".$loggedInUser["lName"];
                                ?>Admin</h1>
                            </button>
                            <!-- user account --> 
                            <div id="user-menu" class="z-10 hidden flex-col absolute bg-white divide-y divide-gray-100 rounded-md shadow w-50 dark:bg-gray-700 w-max">
                                <!-- Dropdown menu -->
                                <div class="px-4 py-3 text-gray-900 dark:text-white">
                                    <h1 class="text-lg">
                                        <?php   
                                            //echo $loggedInUser["fName"]." ".$loggedInUser["lName"];
                                        ?>
                                        Admin
                                    </h1>
                                    <h1 class="font-medium truncate text-sm ">
                                        <?php 
                                            //echo $loggedInUser["userEmail"];
                                        ?>
                                        static@pani.com
                                    </h1 >
                                </div>
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Manage Account</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Orders</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Chats</a>
                                    </li>                  
                                </ul>
                                <div class="py-2">
                                    <a href="../../index.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                                </div>
                            </div>
                            <!-- end of user account -->
                        </div>
                    </div>
                    <!-- end of the uh, account button something nga drop down -->
            </div>
            <!-- end of top navbar -->
            <!--Container-->
            <div class="container p-16" id="users">
                <h3><strong>RESERVATIONS</strong></h3>
                <!--Card-->
                <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow-2xl bg-white">
                <table id="example" class="stripe hover overflow-x-scroll" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
                        <thead class="border-b border-primary-200 bg-primary-100 text-neutral-800">
                        <th>User Info</th>
                        <th>Reservation Info</th>
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
                                    if($row["availability"] == "A"){
                                        ?>
                                      <tr>
                                        <td>
                                            <?php 
                                                echo "ID: " . $row["userID"]."<br>";
                                                echo "Name: " . $row["fName"]. " ".$row["lName"]."<br>";
                                                echo "Email: " . $row["userEmail"]."<br>";
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                echo "Gravesite Class: " . $row["graveClassification"]."<br>";
                                                echo "Block: " . $block."<br>"; 
                                                echo "Lot: " . $lot."<br>"; 
                                                echo "Availability: " . $row["availability"]."<br>";
                                            ?>
                                        </td>
                                          <td>
                                          <?php
                                            if ($row["approval"] == 0) {
                                                echo '<div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6"><br>';
                                                echo '<button type="submit" name="reject" id="reject" class="inline-flex w-full justify-center rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-pink-300 hover:text-black sm:ml-3 sm:w-auto">Reject</button>';
                                                echo '<button type="submit" name="approve" id="approve" class="open-modal-btn inline-flex w-full justify-center rounded-md bg-green-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-pink-300 hover:text-black sm:ml-3 sm:w-auto">Approve</button>';
                                                echo '</div>';
                                            }
                                            else{
                                                echo "Approved";
                                            }
                                          ?>                                                                         
                                          </td>
                                      </tr>
                                        <!-- The Modal -->
                                        <div id="myModal" class="modal relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                                            <div class="fixed inset-0 z-10 overflow-y-auto">
                                                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                                    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                                            <div class="sm:flex sm:items-start">
                                                                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-500 sm:mx-0 sm:h-10 sm:w-10">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10 text-white">
                                                                        <path d="M12 8v4M12 16h.01" />
                                                                    </svg>
                                                                </div>
                                                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                                                    <h3 class="text-2xl leading-6 text-gray-900" id="modal-title">Approve <strong><?php echo $row["fName"]. ' ' . $row["lName"] ?></strong>?</h3>
                                                                    <div class="mt-2 gap-3">
                                                                        <br>
                                                                        <form action="approve.php" method="GET">
                                                                        <!-- Add the hidden input field to pass the requestReserveId value -->
                                                                        UserID: <input name="userID" value="<?php echo $row['userID']; ?>"><br  >
                                                                        GravesiteID: <input name="gravesiteID" value="<?php echo $row['gravesiteID']; ?>">
                                                                        <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                                            <button id="approveButton" name="approveButton" type="submit" class="inline-flex w-full justify-center rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-100 hover:text-black sm:ml-3 sm:w-auto">Confirm</button>
                                                                            <button type="button" class="close mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
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
                                        <!-- End of Modal -->
        
                                      <?php 
                                    }
                                                                       
                                  }
                              }
                              ?>
                    </table>
                </div>
                <!--/Card-->
            </div>
             
        </div>
    </div>
    <!-- end of main div -->
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
      
    <script src="../javascript//user-menu.js"></script>
</body>
</html>