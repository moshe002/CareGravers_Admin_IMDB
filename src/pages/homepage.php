<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta3/css/all.css" integrity="...your-integrity-value-here..." crossorigin="anonymous" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/deceased-info.css">
    <title>Homepage</title>
</head>
<body>
    <!-- main div -->
    <div class="flex flex-row h-screen w-full">
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
                    autofocus
                    id="dashboard"
                    class="flex gap-3 p-2 text-white font-semibold w-full outline-none focus:bg-white focus:text-black duration-300" 
                    onclick="(function(){
                        window.location.href = 'homepage.php';
                    })();" 
                    >
                    <img id="dashboard_img" src="../assets//icons//dark_dashboard_icon.png" alt="dashboard_icon">
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
            <!-- content div (content goes here on specific pages) -->
            <div>homepage/dashboard</div>
            <!-- end of content -->
        </div>
    </div>
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
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
</body>
</html>
