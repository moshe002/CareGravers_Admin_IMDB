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
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
	<!--Replace with your tailwind.css once created-->


	<!--Regular Datatables CSS-->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--Responsive Extension Datatables CSS-->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/deceased-info.css">

</head>
<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
    <!--sidebar-->
    <?php include 'C:\xampp 8\htdocs\CareGravers_Admin_IMDB\src\components\navbar.php';?>   
    <!--Container-->
    <div class="container p-16" id="users"> 
    <h3><strong>DECEASED INFORMATION</strong></h3><br><br>
        <!--Card-->
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow shadow-2xl bg-white">
            <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead class="border-b border-primary-200 bg-primary-100 text-neutral-800">
                <th>ID</th>  
                <th>Name</th>
                <th>DOB</th>
                <th>DOD</th>
                <th>Block</th>
                <th>Lot</th>
                <th>Grave Type</th>
                <th>Action</th>     
            </thead>                
                <?php  
                if(mysqli_num_rows($result) > 0)  
                {  
                    while($row = mysqli_fetch_array($result))  
                    {  
                    // Split the graveCoordinates
                    $graveCoordinates = $row['graveCoordinates'];
                    $split = explode(',', $graveCoordinates);
                    $block = trim($split[0]);
                    $lot = trim($split[1]);
                ?>  
                <tr>  
                    <td><?php echo $row["deceasedID"];?></td>  
                    <td><?php echo $row["nameOfDeceased"]; ?></td>  
                    <td><?php echo $row["dateOfBirth"]; ?></td>  
                    <td><?php echo $row["dateOfDeath"]; ?></td>  
                    <td><?php echo $block; ?></td>  
                    <td><?php echo $lot; ?></td>  
                    <td><?php echo $row["gravesiteClassification"]; ?></td>  
                    <td>                        
                        <a class="text-blue-400 hover:text-pink-500 mx-2">
                            <i class="far fa-edit"></i>
                        </a>
                        <a class="text-blue-400 hover:text-pink-500 mx-2" href="?delete=<?php echo $row['deceasedID']; ?>" onclick="return confirm('Are you sure you want to delete <?php echo $row['nameOfDeceased']; ?>?')">
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