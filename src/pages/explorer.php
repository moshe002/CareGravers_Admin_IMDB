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
	<link rel="stylesheet" href="../css//disabled-info.css">
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
					id="pricing" 
					class="flex gap-3 p-2 text-white font-semibold w-full outline-none focus:bg-white focus:text-black duration-300" 
					onclick="(function(){
						window.location.href = 'pricing.php';
					})();" 
					>
					<img id="pricing_img" class="ml-0.5" src="../assets//icons//white_pricing_icon.png" alt="pricing_icon"> 
					Pricing
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
				 <!-- legend -->
				<div class="flex flex-col gap-3 absolute bottom-10 left-10 p-3 bg-gray-100 shadow-md rounded-md z-50">
					<div class="flex flex-col gap-3">
						<h1 class="font-semibold">Grave Classification</h1>
						<div class="flex flex-col gap-3">
							<div class="flex">
								<img src="..//assets//icons//lawn_lot_box.png" alt="lawn_lot">
								<h1 class="text-gray-500 font-semibold">&nbsp;&nbsp;Lawn Lot</h1>
							</div>
							<div class="flex">
								<img src="..//assets//icons//garden_niche_box.png" alt="garden_niche">
								<h1 class="text-gray-500 font-semibold">&nbsp;&nbsp;Garden Niche</h1>
							</div>
							<div class="flex">
								<img src="..//assets//icons//family_estate_box.png" alt="family_estate">
								<h1 class="text-gray-500 font-semibold">&nbsp;&nbsp;Family Estate</h1>
							</div>
						</div>
					</div>
					<div class="flex flex-col gap-3">
						<h1 class="font-semibold">Lot Status</h1>
						<div class="flex flex-col gap-3">
							<div class="flex">
								<img src="..//assets//icons//available_box.png" alt="available">
								<h1 class="text-gray-500 font-semibold">&nbsp;&nbsp;Available</h1>
							</div>
							<div class="flex">
								<img src="..//assets//icons//reserved_box.png" alt="reserved">
								<h1 class="text-gray-500 font-semibold">&nbsp;&nbsp;Reserved</h1>
							</div>
							<div class="flex">
								<img src="..//assets//icons//occupied_box.png" alt="occupied">
								<h1 class="text-gray-500 font-semibold">&nbsp;&nbsp;Occupied</h1>
							</div>
						</div>
					</div>
				</div>
				<!-- end of legend -->
				<!-- sidebar (occupied) of map -->
				<div id="sidebar" class="hidden flex-col h-screen p-5 absolute top-24 right-0 z-10 overflow-auto duration-200">
					<br>
					<!-- close button of sidebar map -->
					<button 
						class="absolute top-10 right-3"
						onclick="(function(){
							document.getElementById('sidebar').style.display = 'none';
							document.getElementById('map').style.width = '100%';
						})();">&#10006;
					</button>    
					<br>
					<br>
					<div class="flex w-full justify-center items-center rounded-md border-2 -z-10">
						<input class="outline-none p-2 w-full rounded-md focus:outline-blue-400 duration-150" type="search" placeholder="Search here...">
						<button class="rounded-md p-2.5 bg-blue-500">
							<img class="w-5 h-5" src="../assets//icons//search_icon.png" alt="search_icon">
						</button>
					</div>
					<br>
					<div class="flex p-2 border-b-2 w-full text-sm">
					<h1>Status:</h1>
					&nbsp;
					<div class="w-full">
						<select class="w-full font-bold outline-none" id="status" onchange="updateStatus()">
							<option class="font-bold" value="occupied">Occupied</option>
							<option class="font-bold" value="available">Available</option>
							<option class="font-bold" value="reserved">Reserved</option>
						</select>
					</div>
					</div>
					<div id="nameT" class="flex flex-row items-center p-2 border-b-2 w-full text-sm">
						<h1>Name:</h1>
						<input id="name" class="p-1 outline-none w-3/4 font-bold" type="text" value="Jose Rizal" disabled />
						<img onclick="(function(){
							const edit_name = document.getElementById('name');
							edit_name.disabled = !edit_name.disabled;
						})();" class="w-5 h-5 cursor-pointer" src="../assets//icons//edit_pencil_icon.png" alt="edit_icon">
					</div>
					<div id="dobT" class="flex flex-row justify-between items-center p-2 border-b-2 w-full text-sm">
						<h1>Date of Birth:</h1>
						<input id="dob" class="hide-icon outline-none w-24 font-bold" type="date" value="2000-05-05" disabled />
						<img onclick="(function(){
							const edit_dob = document.getElementById('dob');
							edit_dob.disabled = !edit_dob.disabled;
						})();" class="w-5 h-5 cursor-pointer" src="../assets//icons//calendar_icon.png" alt="calendar_icon">
					</div>
					<div id="dodT" class="flex flex-row justify-between items-center p-2 border-b-2 w-full text-sm">
						<h1>Date of Death:</h1>
						<input id="dod" class="hide-icon outline-none w-24 font-bold" type="date" value="2010-01-10" disabled />
						<img onclick="(function(){
							const edit_dod = document.getElementById('dod');
							edit_dod.disabled = !edit_dod.disabled;
						})();" class="w-5 h-5 cursor-pointer" src="../assets//icons//calendar_icon.png" alt="calendar_icon">
					</div>
					<div class="flex flex-row justify-between items-center p-2 border-b-2 w-full text-sm">
						<h1>Block Number:</h1>
						<input id="blockNo" class="p-1 outline-none w-20 font-bold" value="2" type="number" disabled />
						<img onclick="(function(){
							const edit_blockNo = document.getElementById('blockNo');
							edit_blockNo.disabled = !edit_blockNo.disabled;
						})();" class="w-5 h-5 cursor-pointer" src="../assets//icons//edit_pencil_icon.png" alt="edit_icon">
					</div>
					<div class="flex flex-row justify-between items-center p-2 border-b-2 w-full text-sm">
						<h1>Lot Number:</h1>
						<input id="lotNo" class="p-1 outline-none w-20 font-bold" value="59" type="number" disabled />
						<img onclick="(function(){
							const edit_lotNo = document.getElementById('lotNo');
							edit_lotNo.disabled = !edit_lotNo.disabled;
						})();" class="w-5 h-5 cursor-pointer" src="../assets//icons//edit_pencil_icon.png" alt="edit_icon">
					</div>
					<div id="graveImageT" class="flex relative justify-center items-center mt-3">
						<img id="graveImage" src="../assets//images//choose_image_bg.png" class="filter brightness-50 w-52 h-40" alt="choose_img">
						<label class="absolute left-12 rounded-md border-2 border-white text-sm text-white p-3 bg-transparent" for="choose_pic">
							<input id="choose_pic" class="hidden" type="file" />
							Choose image
						</label>
					</div>
					<div class="flex flex-row items-center justify-evenly p-3">
						<button class="bg-blue-400 text-white px-3 py-1 rounded-md opacity-75 hover:opacity-100 duration-150">
							Clear</button>
						<button class="bg-blue-400 text-white px-3 py-1 rounded-md opacity-75 hover:opacity-100 duration-150">
							Save</button>
					</div>
					<br>
				</div> 
				<!-- end of (occupied) sidebar map -->
		</div>
    </div>
    <!-- end of main div -->
    <script src="../javascript//user-menu.js"></script>
    <script src="../javascript//googlemap.js"></script>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8BUuSDeRsrMGCh07tzXoW7UhCr-A2ESI&callback=initMap"></script>
	
	<!-- Script para sa Dropdown arrow sa status -->
	<script>
	function updateStatus() {
		var statusElement = document.getElementById("status");
		var selectedStatus = statusElement.value;
		
		// Do something with the selectedStatus value
		console.log("Selected status:", selectedStatus);
	}
	</script>
	<script src="../javascript//drag-drop.js"></script>
</body>
</html>