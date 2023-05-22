<?php
include("database.php");
$sql = "SELECT * FROM gravesiteclassification WHERE 1";
$result = mysqli_query($conn, $sql);
include("crud.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pricing</title>
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
              id="reservations" 
              class="flex gap-4 p-2 text-white font-semibold w-full outline-none focus:bg-white focus:text-black duration-300"  
              onclick="(function(){
                window.location.href = 'reservation.php';
              })();" 
              >
              <img id="reservations_img" class="ml-0.5" src="../assets//icons//white_reservations_icon.png" alt="reservations_icon"> 
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
              autofocus
              id="pricing" 
              class="flex gap-3 p-2 text-white font-semibold w-full outline-none focus:bg-white focus:text-black duration-300" 
              onclick="(function(){
                window.location.href = 'pricing.php';
              })();" 
              >
              <img id="pricing_img" class="ml-0.5" src="../assets//icons//dark_pricing_icon.png" alt="pricing_icon"> 
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
          <div class="container p-7" id="users">
                      <h3><strong>PRICING</strong></h3>
                      <!--Card-->
                      <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6"><br>
                          <button type="submit" name="add_new_button" id="add_new_button" class="add_new_modal inline-flex w-full justify-center rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-pink-300 hover:text-black sm:ml-3 sm:w-auto">ADD NEW</button>
                      </div>       
                      <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow-2xl bg-white">
                          <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                              <thead class="border-b border-primary-200 bg-primary-100 text-neutral-800">
                              <th>Gravesite ID</th>
                              <th>Garden Type</th>
                              <th>Price per annum</th>
                              <th>Action</th>
                              </thead>
                              <?php
                              if (mysqli_num_rows($result) > 0) {
                                  while ($row = mysqli_fetch_array($result)) {
                                      ?>
                                      <tr>   
                                            <td><?php echo $row["graveClassID"]; ?></td>                                      
                                            <td><?php echo $row["graveClassification"]; ?>
                                            </td>
                                            <td><?php echo $row["price"]; ?></td>
                                          <td>
                                              <!-- Trigger/Open The Modal -->
                                              <a id="myBtn" class="open-modal-btn text-blue-400 hover:text-pink-500 mx-2">
                                                  <i class="far fa-edit"></i>
                                              </a>
                                              <a class="text-blue-400 hover:text-pink-500 mx-2"
                                                href="?delete=<?php echo $row['graveClassification']; ?>"
                                                onclick="return confirm('Are you sure you want to delete <?php echo $row['graveClassification']; ?>? The data will be permanently removed. This action cannot be undone.')">
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
                  <!-- The Create Modal -->
                  <div id="add_new_modal" class="modal relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
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
                                <h3 class="text-2xl font-semibold leading-6 text-gray-900" id="modal-title">Add new Gravesite Classification</h3><br>
                                <div class="mt-2 gap-3">
                                  <form id="add_new" method="GET" action="crud.php">
                                      <label class="text-lg font-semibold leading-6 text-gray-900" >Gravesite ID:</label>
                                      <input class="border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500" id="id" name="id"><br><br>
                                      <label class="text-lg font-semibold leading-6 text-gray-900" >Garden Type: </label>
                                      <input class="border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500" type="text" id="gc" name="gc"><br><br>
                                      <label class="text-lg font-semibold leading-6 text-gray-900" >Price per annum: </label>
                                      <input type="text" id="p" name="p"><br>
                                      <br>

                                      <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                        <button type="submit" name="add_new" class="inline-flex w-full justify-center rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-100 hover:text-black sm:ml-3 sm:w-auto">Save</button>
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
                  <!--end of Create Modal -->
                  <!-- The Upate Modal -->
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
                                <h3 class="text-2xl font-semibold leading-6 text-gray-900" id="modal-title">Edit Pricing</h3>
                                <div class="mt-2 gap-3">
                                  <p class="text-sm text-gray-500">Once Updated, the action cannot be undone.</p><br>
                                  <form id="editForm" method="POST" action="crud.php">
                                      <label class="text-lg font-semibold leading-6 text-gray-900" for="type">Gravesite ID:</label>
                                      <input class="border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500" id="graveClassID" name="graveClassID" readonly><br><br>
                                      <label class="text-lg font-semibold leading-6 text-gray-900" for="type">Garden Type: </label>
                                      <input class="border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500" type="text" id="graveClassification" name="graveClassification"><br>
                                      <br>
                                      <label class="text-lg font-semibold leading-6 text-gray-900" for="nameOfDeceased">Price per annum: </label>
                                      <input type="text" id="price" name="price"><br>
                                      <br>

                                      <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                        <button type="submit" name="update_pricing" class="inline-flex w-full justify-center rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-100 hover:text-black sm:ml-3 sm:w-auto">Update</button>
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
                  <!--end of Update Modal -->
        </div>        
    </div>
    <!-- end of main div -->
  <!-- scripts -->
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
              var gravesiteID = row.find('td:eq(0)').text().trim();
              var gravesiteClassification = row.find('td:eq(1)').text().trim();
              var price = row.find('td:eq(2)').text().trim();
              // Set the form values
              $('#graveClassID').val(gravesiteID);
              $('#graveClassification').val(gravesiteClassification);
              $('#price').val(price);

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
        <script>
      // Open modal on button click
      $('.add_new_modal').click(function () {
              // Get the row data
              var row = $(this).closest('tr');
              var gravesiteID = row.find('td:eq(0)').text().trim();
              var gravesiteClassification = row.find('td:eq(1)').text().trim();
              var price = row.find('td:eq(2)').text().trim();
              // Set the form values
              $('#graveClassID').val(gravesiteID);
              $('#graveClassification').val(gravesiteClassification);
              $('#price').val(price);

              // Show the modal
              $('#add_new_modal').css('display', 'block');
          });

          // Close modal on close button click
          $('.close').click(function () {
              $('#add_new_modal').css('display', 'none');
          });

          // Close modal when clicking outside the modal
          $(window).click(function (event) {
              if (event.target == $('#myModal')[0]) {
                  $('#add_new_modal').css('display', 'none');
              }
          }); 
      </script> 
      <script src="../javascript//user-menu.js"></script>
  </body>
</html>
