<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
	<!-- Replace with your tailwind.css once created -->
	<!-- Regular Datatables CSS -->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!-- Responsive Extension Datatables CSS -->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <title>Explorer</title>
    <style>
        #map {
            height: 82vh;
            width: 100%; 
        }
		#sidebar {
			height: 85vh;
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
                    autofocus
					id="explorer"
					class="flex gap-4 p-2 text-white font-semibold w-full outline-none focus:bg-white focus:text-black duration-300" 
					onclick="(function(){
						window.location.href = 'explorer.php';
					})();" 
					>
					<img id="explorer_img" class="ml-0.5" src="../assets//icons//dark_explorer_icon.png" alt="explorer_icon">
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
        <div class="w-full relative">
                <!-- top navbar -->
                <div class="flex justify-between items-center h-1/6 w-full z-50 shadow-2xl">
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
                <!-- PUT CONTENT HERE -->
                <div id="map" class="border-2 duration-200"></div>
					<!-- sidebar of map -->
					<div id="sidebar" class="hidden flex-col h-screen p-5 absolute top-20 right-0 z-10 duration-200">
						<!-- close button of sidebar map -->
						<button 
							class="absolute top-5 right-1"
							onclick="(function(){
								document.getElementById('sidebar').style.display = 'none';
								document.getElementById('map').style.width = '100%';
							})();">&#10006;
						</button>    
						<br>
						<br>
						<div class="flex w-full justify-center items-center rounded-md border-2 border-green-400">
							<input class="outline-none p-2 w-full rounded-md focus:outline-blue-400 duration-150" type="search" placeholder="Search here...">
							<button class="rounded-md p-2.5 bg-blue-500">
								<img class="w-5 h-5" src="../assets//icons//search_icon.png" alt="search_icon">
							</button>
						</div>
						<div class="flex p-2 border-b-2 w-full text-sm">
							<h1>Status:</h1>
							&nbsp;
							<h1><b id="status"></b></h1>
						</div>
						<div id="nameT" class="p-2 border-b-2 w-full text-sm" style="display:none">
							<h1>Deceased Name:</h1>
							&nbsp;
							<h1><b id="name"></b></h1>
						</div>
						<div id="dobT" style="display:none" class="p-2 border-b-2 w-full text-sm">
							<h1>Date of Birth:</h1>
							&nbsp;
							<h1><b id="dob"></b></h1>
						</div>
						<div id="dodT" style="display:none" class="p-2 border-b-2 w-full text-sm">
							<h1>Date of Death:</h1>
							&nbsp;
							<h1><b id="dod"></b></h1>
						</div>
						<div class="flex p-2 border-b-2 w-full text-sm">
							<h1>Block Number:</h1>
							&nbsp;
							<h1><b id="blockNo"></b></h1>
						</div>
						<div class="flex p-2 border-b-2 w-full text-sm">
							<h1>Lot Number:</h1>
							&nbsp;
							<h1><b id="lotNo"></b></h1>
						</div>
						<div id="graveImageT" class="justify-center w-full border-2" style="display:none">
							<img id="graveImage" class="w-20 h-20" alt="tombstone">
						</div>
						<div id="graveClassT" style="display:none" class="p-2 border-b-2 w-full">
							<h1>Grave Classification:</h1>
							&nbsp;
							<h1><b id="graveClass"></b></h1>
						</div>
						<div id="priceT" style="display:none" class="p-2 border-b-2 w-full">
							<h1>Price:</h1>&nbsp;
							<h1><b id="price">;
							</b></h1>
						</div>
						<br>
						<div id="buttonAvailableT" style="display:none" class="justify-center w-full">
							<!-- onclick open modal -->
							<button onclick="(function(){
								document.getElementById('payment_modal').style.display = 'flex';
							})();" class="bg-blue-500 text-white p-2 w-1/2 font-semibold rounded-md">Reserve Now</button>
						</div>
					</div> 
					<!-- end of sidebar map -->
		</div>
    </div>
    <!-- end of main div -->
    <script src="../javascript//user-menu.js"></script>
    <script src="../javascript//googlemap.js"></script>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8BUuSDeRsrMGCh07tzXoW7UhCr-A2ESI&callback=initMap"></script>
</body>
</html>