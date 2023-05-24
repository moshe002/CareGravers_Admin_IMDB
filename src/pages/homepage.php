<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta3/css/all.css" integrity="...your-integrity-value-here..." crossorigin="anonymous" />
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!--Replace with your tailwind.css once created-->
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">    
	<link rel="stylesheet" href="../css/deceased-info.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>    
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>

<style>
@import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);
@import url(https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css);
</style>
	<title>Dashboard</title>
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
                <!-- PUT CONTENT HERE -->
                <br>
				<!-- content div (reservation) -->
				<div id="reservation" class="flex flex-col">
					<!-- boxes stuff -->
					<div class="flex flex-row justify-evenly p-3">
						<div class="text-center bg-blue-200 shadow-2xl px-3 py-3 rounded-md">
							<h1 class="text-2xl font-bold">8</h1>
							<h1>Total Admin</h1>
						</div>
						<div class="text-center bg-blue-200 shadow-2xl p-2 rounded-md">
							<h1 class="text-2xl font-bold">157</h1>
							<h1>Online Visitors</h1>
						</div>
						<div class="text-center bg-blue-200 shadow-2xl p-2 rounded-md">
							<h1 class="text-2xl font-bold">2.5 M</h1>
							<h1>Total Sales</h1>
						</div>
						<div class="text-center bg-blue-200 shadow-2xl p-2 rounded-md">
							<h1 class="text-2xl font-bold">0</h1>
							<h1>Reservations</h1>
						</div>
					</div>
					<!-- end of boxes stuff -->
					<!--Container-->
				</div>
				<!-- end of content div (reservation) -->
                <!--CHART-->
                <div class="text-gray-500 rounded shadow-xl py-5 px-5 w-full sm:w-2/4 px-1.5 ml-14 mt-20" x-data="{chartData:chartData()}" x-init="chartData.fetch()">
                    <div class="flex flex-wrap items-end">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold leading-tight">Income</h3>
                        </div>
                        <div class="relative" @click.away="chartData.showDropdown=false">
                            <button class="text-xs hover:text-gray-300 h-6 focus:outline-none" @click="chartData.showDropdown=!chartData.showDropdown">
                                <span x-text="chartData.options[chartData.selectedOption].label"></span><i class="ml-1 mdi mdi-chevron-down"></i>
                            </button>
                            <div class="shadow-lg rounded text-sm absolute top-auto right-0 min-w-full w-32 z-30 mt-1 -mr-3" x-show="chartData.showDropdown" style="display: none;" x-transition:enter="transition ease duration-300 transform" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease duration-300 transform" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-4">
                                <span class="absolute top-0 right-0 w-3 h-3 transform rotate-45 -mt-1 mr-3"></span>
                                <div class="rounded w-full relative z-10 py-1">
                                    <ul class="list-reset text-xs">
                                        <template x-for="(item,index) in chartData.options">
                                            <li class="px-4 py-2 hover:bg-gray-600 hover:text-white transition-colors duration-100 cursor-pointer" :class="{'text-white':index==chartData.selectedOption}" @click="chartData.selectOption(index);chartData.showDropdown=false">
                                                <span x-text="item.label"></span>
                                            </li>
                                        </template>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-end mb-5">
                        <h4 class="text-2xl lg:text-3xl text-white font-semibold leading-tight inline-block mr-2" x-text="'$'+(chartData.data?chartData.data[chartData.date].total.comma_formatter():0)">0</h4>
                        <span class="inline-block" :class="chartData.data&&chartData.data[chartData.date].upDown<0?'text-red-500':'text-green-500'"><span x-text="chartData.data&&chartData.data[chartData.date].upDown<0?'▼':'▲'">0</span> <span x-text="chartData.data?chartData.data[chartData.date].upDown:0">0</span>%</span>
                    </div>
                    <div>
                        <canvas id="chart" class="w-full"></canvas>
                    </div>
                </div>    
                <!--END OF CHART-->
                <!-- PROGRESS BAR -->
                <!-- <div class="flex text-gray-500 rounded shadow-xl py-5 px-5 w-full sm:w-2/4 px-1.5 ml-14 mt-20">
                    <main>
        
                        <section x-data="skillDisplay"
                            class="p-6 space-y-6 rounded-xl md:grid md:grid-cols-2 md:gap-4 sm:space-y-0 ">
                            <div class="grid grid-cols-2 gap-6">
                                <p>HELLO</p>
                            </div>
                            <div class="flex items-center justify-center" x-data="{ circumference: 2 * 22 / 7 * 120 }">
                                <svg class="transform -rotate-90 w-72 h-72">
                                    <circle cx="145" cy="145" r="120" stroke="currentColor" stroke-width="30" fill="transparent"
                                        class="text-gray-700" />

                                    <circle cx="145" cy="145" r="120" stroke="currentColor" stroke-width="30" fill="transparent"
                                        :stroke-dasharray="circumference"
                                        :stroke-dashoffset="circumference - currentSkill.percent / 100 * circumference"
                                        class="text-blue-500 " />
                                </svg>
                                <span class="absolute text-5xl" x-text="`${currentSkill.percent}%`"></span>
                        </section>
                    </main>
                </div> -->
                <!-- END OF PROGRESS BAR -->   
                
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
            var table = $('#example1').DataTable({
                responsive: true
            })
                .columns.adjust()
                .responsive.recalc();
        });

		$(document).ready(function () {
            var table = $('#example2').DataTable({
                responsive: true
            })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
    <script src="../javascript//line-graph.js"></script>
    <script src="../javascript//progress-bar.js"></script>
    <script src="../javascript//user-menu.js"></script>
	<script src="../javascript//payments.js"></script>
</body>
</html>