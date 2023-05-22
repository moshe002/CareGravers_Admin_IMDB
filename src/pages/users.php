<?php
	include("fetch_database.php");
?>
<!DOCTYPE html>
<html lang="en" class="antialiased">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
	<!-- Replace with your tailwind.css once created -->
	<!-- Regular Datatables CSS -->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!-- Responsive Extension Datatables CSS -->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
	<title>Users</title>
	<style>
		/*Form fields*/
		.dataTables_wrapper select,
		.dataTables_wrapper .dataTables_filter input {
			color: #4a5568;
			padding-left: 1rem;	
			padding-right: 1rem;
			padding-top: .5rem;
			padding-bottom: .5rem;
			line-height: 1.25;
			border-width: 2px;
			border-radius: .25rem;
			border-color: #edf2f7;
			background-color: #edf2f7;
		}

		/*Row Hover*/
		table.dataTable.hover tbody tr:hover,
		table.dataTable.display tbody tr:hover {
			background-color: #ebf4ff;
            cursor: pointer;
			
		}

		/*Pagination Buttons*/
		.dataTables_wrapper .dataTables_paginate .paginate_button {
			font-weight: 700;		
			border-radius: .25rem;		
			border: 1px solid transparent;
		}

		/*Pagination Buttons - Current selected */
		.dataTables_wrapper .dataTables_paginate .paginate_button.current {
			color: #fff !important;
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			font-weight: 700;
			border-radius: .25rem;
			background: #23A6F0 !important;
			border: 1px solid transparent;
		}

		/*Pagination Buttons - Hover */
		.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
			color: #fff !important;
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			font-weight: 700;
			border-radius: .25rem;
			background: #23A6F0 !important;
			border: 1px solid transparent;
            cursor: pointer;
		}

		/*Add padding to bottom border */
		table.dataTable.no-footer {
			border-bottom: 1px solid #e2e8f0;
			margin-top: 0.75em;
			margin-bottom: 0.75em;
		}

		/*Change colour of responsive icon*/
		table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
		table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
			background-color: #667eea !important;
		}
        th{
            background-color: #23A6F0;
            text-align: justify;
            color: white;
        }

	</style>
</head>
<body>
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
					autofocus
					id="users"  
					class="flex gap-3 p-2 text-white font-semibold w-full outline-none focus:bg-white focus:text-black duration-300"
					onclick="(function(){
						window.location.href = 'users.php';
					})();" 
					>
					<img id="users_img" class="ml-0.5" src="../assets//icons//dark_users_icon.png" alt="users_icon">
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
			<!-- Container -->
			<div class="container p-16 w-full h-fit" id="users"> 
				<h3><strong>USERS</strong></h3>
				<!-- Card -->
				<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow-2xl bg-white">
					<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
					<thead class="border-b border-primary-200 bg-primary-100 text-neutral-800">
						<th>ID</th>
						<th>Fname</th>
						<th>Lname</th>
						<th>Email</th>
						<th>Username</th>
						<th>Contact#</th>
						<th>DateJoined</th>
					</thead>
					<tbody>
						<?php 
							if(is_array($fetchData)){      
							$sn=1;
								foreach($fetchData as $data){
						?>
						<tr>
							<td><?php echo $data['userID']??''; ?></td>
							<td><?php echo $data['fName']??''; ?></td>
							<td><?php echo $data['lName']??''; ?></td>
							<td><?php echo $data['userEmail']??''; ?></td>
							<td><?php echo $data['userName']??''; ?></td>
							<td><?php echo $data['contactNo']??''; ?></td>
							<td><?php echo $data['dateJoined']??''; ?></td>  
						</tr>
						<?php $sn++;}}
							else{ ?>
							<tr>
								<td colspan="8">
							<?php echo $fetchData; ?>
							</td>
							<tr>
						<?php
						}?>
					</tbody>
					</table>
				</div>
				<!-- end of Card -->
			</div>
			<!-- end of container -->
		</div>
		
	</div>
	<!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<!-- Datatables  -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	<script>
		$(document).ready(function() {

			var table = $('#example').DataTable({
					responsive: true
				})
				.columns.adjust()
				.responsive.recalc();
		});
	</script>
	<script src="../javascript//user-menu.js"></script>
</body>
</html>