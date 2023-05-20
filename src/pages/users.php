<?php
include("fetch_database.php");
?>
<!DOCTYPE html>
<html lang="en" class="antialiased">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>USERS </title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
	<!--Replace with your tailwind.css once created-->


	<!--Regular Datatables CSS-->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--Responsive Extension Datatables CSS-->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

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
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);/
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
<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
    <!--sidebar-->
    <?php include 'C:\xampp 8\htdocs\CareGravers_Admin_IMDB\src\components\navbar.php';?>   
	<!--Container-->
	<div class="container p-16" id="users"> 
		<!--Card-->
		<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow shadow-2xl bg-white">
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
		<!--/Card-->
	</div>
	<!--/container-->
	<!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<!--Datatables -->
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

</body>

</html>